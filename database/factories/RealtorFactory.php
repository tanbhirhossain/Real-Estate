<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Realtor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RealtorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();

        // Ensure that a User exists, or create one if it doesn't
        $user = User::inRandomOrder()->first() ?? User::factory()->create();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'bio' => $this->faker->paragraph(),
            'address' => $this->faker->address(),
            'created_by' => $user->id,  // Assign the user id safely
        ];
    }

    /**
     * Configure the factory to attach a media file after creating the realtor.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function configure()
    {
        return $this->afterCreating(function (Realtor $realtor) {
            // Assuming media is stored in 'storage/app/public/profiles/' folder
            $imagePath = storage_path('app/public/profiles/profile' . rand(1, 5) . '.jpg'); // Example image path
            
            if (file_exists($imagePath)) {
                $image = new UploadedFile(
                    $imagePath, 
                    'profile.jpg', 
                    'image/jpeg', 
                    filesize($imagePath),  // Correctly get the file size in bytes
                    0, // No error
                    true
                );

                // Attach media to the realtor profile_image collection
                $realtor->addMedia($image)
                    ->preservingOriginal()
                    ->usingName('profile.jpg')
                    ->usingFileName('profile.jpg')
                    ->toMediaCollection('profile_image');
            }
        });
    }
}
