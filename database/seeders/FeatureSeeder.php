<?php

namespace Database\Seeders;

use App\Models\Feture;
use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'ated Community',
            'Automatic Sprinklers',
            'Fireplace',
            'Window Shutters',
            'Ocean Views',
            'Heated Floors',
            'Private Patio',
            'Window Shutters',
            'Fireplace',
           'Beach Access',
           'Rooftop Terrace',
        ];

        foreach($datas as $data){
            Feature::create([
                'name' => $data,
                'created_by' => Auth::id() ?? Null
            ]);
        }
    }
}
