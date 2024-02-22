<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['Plan One', 2800000, 'Introduction Lorem ipsum dolor sit amet, consectetur.'],
            ['Plan Two', 2800000, 'Introduction Lorem ipsum dolor sit amet, consectetur.'],
            ['Plan Three', 2800000, 'Introduction Lorem ipsum dolor sit amet, consectetur.'],
            ['Plan Four', 2800000, 'Introduction Lorem ipsum dolor sit amet, consectetur.'],
            ['Plan Five', 2800000, 'Introduction Lorem ipsum dolor sit amet, consectetur.'],
        ];

        foreach ($datas as $data) {
            Plan::create([
                'name' => $data[0],
                'price' => $data[1],
                'description' => $data[2],
                'benefits' => ['Benefit 1', 'Benefit 2', 'Benefit 3', 'Benefit 4'],
                'is_active' => true,
            ]);
        }
    }
}
