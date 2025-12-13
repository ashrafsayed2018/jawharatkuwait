<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // Rename existing columns if you want specific structure
            // Or keep as is and just add new records
            
            // Add new columns if you want dedicated columns
            $table->string('site_name')->nullable()->after('value');
            $table->string('meta_title')->nullable()->after('site_name');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('phone_number')->nullable()->after('meta_description');
            $table->text('terms_conditions')->nullable()->after('phone_number');
            $table->text('privacy_policy')->nullable()->after('terms_conditions');
            $table->string('logo_path')->nullable()->after('privacy_policy');
            $table->string('favicon_path')->nullable()->after('logo_path');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'site_name', 
                'meta_title', 
                'meta_description', 
                'phone_number', 
                'terms_conditions', 
                'privacy_policy', 
                'logo_path', 
                'favicon_path'
            ]);
        });
    }
};