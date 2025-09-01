<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            // Grams
            ['name' => '50g'],
            ['name' => '100g'],
            ['name' => '125g'],
            ['name' => '150g'],
            ['name' => '200g'],
            ['name' => '250g'],
            ['name' => '300g'],
            ['name' => '400g'],
            ['name' => '500g'],
            ['name' => '750g'],

            // Kilograms
            ['name' => '1kg'],
            ['name' => '1.25kg'],
            ['name' => '1.5kg'],
            ['name' => '2kg'],
            ['name' => '2.5kg'],
            ['name' => '3kg'],
            ['name' => '5kg'],
            ['name' => '10kg'],

            // Liter / ml
            ['name' => '100ml'],
            ['name' => '250ml'],
            ['name' => '500ml'],
            ['name' => '750ml'],
            ['name' => '1L'],
            ['name' => '1.25L'],
            ['name' => '1.5L'],
            ['name' => '2L'],
            ['name' => '3L'],
            ['name' => '5L'],
            ['name' => '10L'],

            // Others
            ['name' => 'Pack'],
            ['name' => 'Piece'],
            ['name' => 'Box'],
            ['name' => 'Dozen'],
            ['name' => 'Set'],
        ];

        foreach ($sizes as $s) {
            Size::firstOrCreate(['size_name' => $s['name']]);
        }
    }
}
