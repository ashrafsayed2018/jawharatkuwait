<?php

namespace Tests\Feature;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingTest extends TestCase
{
    use RefreshDatabase;

    // ─── Submission ────────────────────────────────────────────────────────────

    public function test_guest_can_submit_a_valid_rating(): void
    {
        $response = $this->postJson(route('ratings.store'), [
            'overall'      => 5,
            'price'        => 4,
            'service'      => 5,
            'staff'        => 4,
            'quality'      => 5,
            'comment'      => 'خدمة رائعة جداً',
            'reviewer_name' => 'محمد الكويتي',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseHas('ratings', [
            'overall' => 5,
            'comment' => 'خدمة رائعة جداً',
            'is_approved' => false,
        ]);
    }

    public function test_rating_requires_overall_score(): void
    {
        $response = $this->postJson(route('ratings.store'), [
            'price'   => 4,
            'service' => 5,
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['overall']);
    }

    public function test_overall_score_must_be_between_1_and_5(): void
    {
        $this->postJson(route('ratings.store'), ['overall' => 0])
             ->assertStatus(422)
             ->assertJsonValidationErrors(['overall']);

        $this->postJson(route('ratings.store'), ['overall' => 6])
             ->assertStatus(422)
             ->assertJsonValidationErrors(['overall']);
    }

    public function test_all_sub_scores_must_be_between_1_and_5(): void
    {
        foreach (['price', 'service', 'staff', 'quality'] as $field) {
            $this->postJson(route('ratings.store'), array_merge(
                ['overall' => 5],
                [$field => 6]
            ))->assertStatus(422)
              ->assertJsonValidationErrors([$field]);
        }
    }

    public function test_comment_is_optional(): void
    {
        $response = $this->postJson(route('ratings.store'), [
            'overall' => 4,
        ]);

        $response->assertStatus(200)->assertJson(['success' => true]);
    }

    public function test_comment_max_length_is_1000(): void
    {
        $response = $this->postJson(route('ratings.store'), [
            'overall' => 5,
            'comment' => str_repeat('أ', 1001),
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['comment']);
    }

    public function test_reviewer_name_max_length_is_100(): void
    {
        $response = $this->postJson(route('ratings.store'), [
            'overall'       => 5,
            'reviewer_name' => str_repeat('a', 101),
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['reviewer_name']);
    }

    public function test_new_rating_is_published_immediately(): void
    {
        $this->postJson(route('ratings.store'), ['overall' => 5]);

        $this->assertDatabaseHas('ratings', ['is_approved' => true]);
    }

    // ─── Public display ────────────────────────────────────────────────────────

    public function test_only_approved_ratings_are_returned_on_public_endpoint(): void
    {
        Rating::factory()->create(['is_approved' => true,  'overall' => 5, 'comment' => 'Approved']);
        Rating::factory()->create(['is_approved' => false, 'overall' => 3, 'comment' => 'Pending']);

        $response = $this->getJson(route('ratings.index'));

        $response->assertStatus(200)
                 ->assertJsonFragment(['comment' => 'Approved'])
                 ->assertJsonMissing(['comment' => 'Pending']);
    }

    public function test_ratings_index_returns_average_and_count(): void
    {
        Rating::factory()->create(['is_approved' => true, 'overall' => 4]);
        Rating::factory()->create(['is_approved' => true, 'overall' => 5]);

        $response = $this->getJson(route('ratings.index'));

        $response->assertStatus(200)
                 ->assertJsonStructure(['average', 'count', 'ratings']);
    }

    public function test_average_is_calculated_correctly(): void
    {
        Rating::factory()->create(['is_approved' => true, 'overall' => 4]);
        Rating::factory()->create(['is_approved' => true, 'overall' => 5]);

        $response = $this->getJson(route('ratings.index'));

        $this->assertEquals(4.5, $response->json('average'));
    }

    // ─── Admin management ──────────────────────────────────────────────────────

    public function test_admin_can_approve_a_rating(): void
    {
        $admin  = User::factory()->create();
        $rating = Rating::factory()->create(['is_approved' => false]);

        $response = $this->actingAs($admin)
                         ->patchJson(route('admin.ratings.approve', $rating));

        $response->assertStatus(200);
        $this->assertTrue($rating->fresh()->is_approved);
    }

    public function test_admin_can_delete_a_rating(): void
    {
        $admin  = User::factory()->create();
        $rating = Rating::factory()->create();

        $this->actingAs($admin)
             ->deleteJson(route('admin.ratings.destroy', $rating))
             ->assertStatus(200);

        $this->assertDatabaseMissing('ratings', ['id' => $rating->id]);
    }

    public function test_guest_cannot_approve_a_rating(): void
    {
        $rating = Rating::factory()->create(['is_approved' => false]);

        $this->patchJson(route('admin.ratings.approve', $rating))
             ->assertStatus(401);
    }

    public function test_admin_ratings_index_shows_all_ratings(): void
    {
        $admin = User::factory()->create();
        Rating::factory()->count(3)->create(['is_approved' => true]);
        Rating::factory()->count(2)->create(['is_approved' => false]);

        $response = $this->actingAs($admin)
                         ->getJson(route('admin.ratings.index'));

        $response->assertStatus(200)
                 ->assertJsonCount(5, 'ratings');
    }

    // ─── Model helpers ─────────────────────────────────────────────────────────

    public function test_rating_average_score_attribute(): void
    {
        $rating = Rating::factory()->create([
            'price'   => 4,
            'service' => 5,
            'staff'   => 3,
            'quality' => 4,
        ]);

        $this->assertEquals(4.0, $rating->average_sub_score);
    }

    public function test_rating_scope_approved_filters_correctly(): void
    {
        Rating::factory()->count(2)->create(['is_approved' => true]);
        Rating::factory()->count(3)->create(['is_approved' => false]);

        $this->assertCount(2, Rating::approved()->get());
    }

    public function test_rating_scope_pending_filters_correctly(): void
    {
        Rating::factory()->count(2)->create(['is_approved' => true]);
        Rating::factory()->count(3)->create(['is_approved' => false]);

        $this->assertCount(3, Rating::pending()->get());
    }
}
