<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // Migrate existing tags
        $posts = DB::table('posts')->whereNotNull('tags')->get();
        foreach ($posts as $post) {
            $tags = json_decode($post->tags);
            if (is_array($tags)) {
                foreach ($tags as $tagName) {
                    $tagName = trim($tagName);
                    if (empty($tagName)) continue;
                    
                    if (preg_match('/\p{Arabic}/u', $tagName)) {
                        $slug = preg_replace('/\s+/u', '-', $tagName);
                        $slug = preg_replace('/[^\p{Arabic}\p{N}\-]+/u', '', $slug);
                        $slug = trim($slug, '-');
                    } else {
                        $slug = Str::slug($tagName);
                    }
                    
                    // Insert tag if not exists
                    $tagId = DB::table('tags')->where('slug', $slug)->value('id');
                    if (!$tagId) {
                        $tagId = DB::table('tags')->insertGetId([
                            'name' => $tagName,
                            'slug' => $slug,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }

                    // Attach to post
                    DB::table('post_tag')->insertOrIgnore([
                        'post_id' => $post->id,
                        'tag_id' => $tagId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
