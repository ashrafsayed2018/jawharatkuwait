<?php

namespace Tests\Unit;

use App\Models\Rating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_fillable_fields_are_correct(): void
    {
        $expected = [
            'overall', 'price', 'service', 'staff', 'quality',
            'comment', 'reviewer_name', 'is_approved',
        ];

        $rating = new Rating();
        $this->assertEquals($expected, $rating->getFillable());
    }

    public function test_is_approved_is_cast_to_boolean(): void
    {
        $rating = Rating::factory()->create(['is_approved' => 1]);
        $this->assertIsBool($rating->is_approved);
    }

    public function test_average_sub_score_returns_null_when_no_sub_scores(): void
    {
        $rating = Rating::factory()->create([
            'price'   => null,
            'service' => null,
            'staff'   => null,
            'quality' => null,
        ]);

        $this->assertNull($rating->average_sub_score);
    }

    public function test_average_sub_score_ignores_null_fields(): void
    {
        $rating = Rating::factory()->create([
            'price'   => 4,
            'service' => 5,
            'staff'   => null,
            'quality' => null,
        ]);

        $this->assertEquals(4.5, $rating->average_sub_score);
    }

    public function test_stars_array_returns_correct_filled_empty_counts(): void
    {
        $rating = Rating::factory()->create(['overall' => 3]);

        $stars = $rating->stars_array;

        $this->assertCount(5, $stars);
        $this->assertEquals(3, collect($stars)->where('filled', true)->count());
        $this->assertEquals(2, collect($stars)->where('filled', false)->count());
    }

    public function test_approved_scope(): void
    {
        Rating::factory()->create(['is_approved' => true]);
        Rating::factory()->create(['is_approved' => false]);

        $this->assertCount(1, Rating::approved()->get());
    }

    public function test_pending_scope(): void
    {
        Rating::factory()->create(['is_approved' => true]);
        Rating::factory()->create(['is_approved' => false]);

        $this->assertCount(1, Rating::pending()->get());
    }

    public function test_overall_score_validation_in_factory(): void
    {
        $rating = Rating::factory()->create(['overall' => 5]);
        $this->assertEquals(5, $rating->overall);
    }

    public function test_rating_label_for_score(): void
    {
        $this->assertEquals('ممتاز',    Rating::labelFor(5));
        $this->assertEquals('جيد جداً', Rating::labelFor(4));
        $this->assertEquals('جيد',      Rating::labelFor(3));
        $this->assertEquals('مقبول',    Rating::labelFor(2));
        $this->assertEquals('ضعيف',     Rating::labelFor(1));
    }
}
