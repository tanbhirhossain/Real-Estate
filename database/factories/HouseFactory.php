<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\House;
use App\Models\Feature;
use App\Models\Realtor;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\AssignFeature;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    protected $model = House::class;

    public function definition(): array
    {
        $title = $this->faker->streetName();

        return [
            'realtor_id'   => Realtor::factory(),
            'category_id'  => Category::factory(),
            'created_by'   => User::factory(),
            'title'        => $title,
            // Append a unique number to ensure slug uniqueness
            'slug'         => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1000, 9999),
            'short_desc'   => $this->faker->sentence(),
            'descriptions' => $this->faker->paragraphs(3, true),
            'price'        => $this->faker->numberBetween(50000, 500000),
            'city'         => $this->faker->city(),
            'address'      => $this->faker->address(),
            'bedroom'      => $this->faker->numberBetween(1, 5),
            'bathroom'     => $this->faker->numberBetween(1, 3),
            'size'         => $this->faker->numberBetween(500, 2500),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (House $house) {
            // Assign 2–4 random features
            $featureIds = Feature::inRandomOrder()->limit(rand(2, 4))->pluck('id');

            foreach ($featureIds as $featureId) {
                AssignFeature::create([
                    'house_id'   => $house->id,
                    'feature_id' => $featureId,
                ]);
            }

            // Attach 2–4 random gallery images
            $imageCount = rand(2, 4);
            for ($i = 1; $i <= $imageCount; $i++) {
                $imageName = "house{$i}.jpg"; // Ensure these exist
                $filePath = database_path("seeders/media-samples/{$imageName}");

                if (file_exists($filePath)) {
                    $file = new UploadedFile($filePath, $imageName, 'image/jpeg', null, true);

                    $house->addMedia($file)
                        ->preservingOriginal()
                        ->usingName("Gallery Image {$i}")
                        ->usingFileName("house-{$house->id}-{$i}.jpg")
                        ->toMediaCollection('house_gallery_images');
                }
            }
        });
    }
}
