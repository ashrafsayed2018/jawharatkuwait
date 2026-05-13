<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('overall');
            $table->unsignedTinyInteger('price')->nullable();
            $table->unsignedTinyInteger('service')->nullable();
            $table->unsignedTinyInteger('staff')->nullable();
            $table->unsignedTinyInteger('quality')->nullable();
            $table->text('comment')->nullable();
            $table->string('reviewer_name', 100)->nullable();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
