<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::insert([
            [
                'title' => 'facebook',
                'slug' => 'facebook',
                'color' => '#ffffff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'instagram',
                'slug' => 'instagram',
                'color' => '#ffffff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'youtube',
                'slug' => 'youtube',
                'color' => '#ffffff',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
