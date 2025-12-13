<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('whatsapp_number')->nullable()->after('phone_number');
            $table->string('instagram_url')->nullable()->after('whatsapp_number');
            $table->string('snapchat_url')->nullable()->after('instagram_url');
            $table->string('tiktok_url')->nullable()->after('snapchat_url');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['whatsapp_number','instagram_url','snapchat_url','tiktok_url']);
        });
    }
};
