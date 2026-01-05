<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Helpers\ServiceHelper;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = ServiceHelper::getFallbackServices();

        foreach ($services as $serviceData) {
            Service::updateOrCreate(
                ['slug' => $serviceData['slug']], // Check for existence by slug
                $serviceData
            );
        }
    }
}
