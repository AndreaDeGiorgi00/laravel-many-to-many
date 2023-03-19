<?php

namespace Database\Seeders;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class technologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_technologies = config('technologies');

        foreach ($all_technologies as $technology) {
            $new_technology = new technology;
            $new_technology->name = $technology['name'];
            $new_technology->color = $technology['color'];
            $new_technology->save();

        }
    }
}
