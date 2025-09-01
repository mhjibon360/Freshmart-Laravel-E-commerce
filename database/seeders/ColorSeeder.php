<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name' => 'Fresh Green', 'code' => '#0AAD0A'],
            ['name' => 'Emerald',     'code' => '#198754'],
            ['name' => 'Mint',        'code' => '#10B981'],
            ['name' => 'Teal',        'code' => '#20C997'],
            ['name' => 'Leaf Green',  'code' => '#16A34A'],
            ['name' => 'Olive',       'code' => '#6B8E23'],
            ['name' => 'Lemon',       'code' => '#FFC107'],
            ['name' => 'Carrot',      'code' => '#FD7E14'],
            ['name' => 'Tomato',      'code' => '#DC3545'],
            ['name' => 'Berry',       'code' => '#A21CAF'],
            ['name' => 'Blueberry',   'code' => '#0D6EFD'],
            ['name' => 'Sky',         'code' => '#0DCAF0'],
            ['name' => 'Charcoal',    'code' => '#343A40'],
            ['name' => 'Slate',       'code' => '#6C757D'],
            ['name' => 'Ash',         'code' => '#94A3B8'],
            ['name' => 'Snow',        'code' => '#F8F9FA'],
            ['name' => 'Mist',        'code' => '#E9ECEF'],
        ];

        foreach ($colors as $c) {
            Color::firstOrCreate([
                'color_name' => $c['name'],
                'created_at' => now(),
            ]);
        }
    }
}
