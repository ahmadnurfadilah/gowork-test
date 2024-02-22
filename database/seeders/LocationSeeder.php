<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = ['Fatmawati', 'Kemang', 'Pacific Place', 'Pondok Indah', 'Senayan City'];

        foreach ($datas as $data) {
            Location::create([
                'name' => $data,
                'phone' => '0811-1111-1111',
                'address' => 'Jl. Lorem ipsum dolor sit amet, Jakarta',
                'is_active' => true,
            ]);
        }
    }
}
