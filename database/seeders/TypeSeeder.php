<?php

namespace Database\Seeders;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_type = config('type');
        foreach($all_type as $type){
            $new_type = new Type;
            $new_type->name = $type['name'];
            $new_type->color = $type['color'];
            $new_type->save();
        }
    }
}
