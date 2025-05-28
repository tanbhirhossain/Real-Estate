<?php

namespace Database\Seeders;

use App\Models\House;
use App\Models\Realtor;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\FeatureSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoRealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(FeatureSeeder::class);

        // Create some categories
        $categories = Category::factory()->count(5)->create();


        // Create some realtors with profile images
        $realtors = Realtor::factory()->count(3)->create();

        // For each realtor, create houses
        foreach ($realtors as $realtor) {
            House::factory()
                ->count(5000)
                ->for($realtor)
                ->for($categories->random())
                ->create();
        }

        $this->command->info('Demo real estate data seeded successfully.');
    }
}
