<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
            ['coupon_name' => 'FRESH20', 'coupon_discount' => 20, 'coupon_validity' => now()->addDays(10)],
            ['coupon_name' => 'WELCOME10', 'coupon_discount' => 10, 'coupon_validity' => now()->addDays(15)],
            ['coupon_name' => 'SAVE50', 'coupon_discount' => 50, 'coupon_validity' => now()->addDays(7)],
            ['coupon_name' => 'HOTDEAL15', 'coupon_discount' => 15, 'coupon_validity' => now()->addDays(20)],
            ['coupon_name' => 'SALE25', 'coupon_discount' => 25, 'coupon_validity' => now()->addDays(12)],
            ['coupon_name' => 'NEWUSER30', 'coupon_discount' => 30, 'coupon_validity' => now()->addDays(30)],
            ['coupon_name' => 'FESTIVE40', 'coupon_discount' => 40, 'coupon_validity' => now()->addDays(5)],
            ['coupon_name' => 'BIGSALE10', 'coupon_discount' => 10, 'coupon_validity' => now()->addDays(18)],
            ['coupon_name' => 'WEEKEND5', 'coupon_discount' => 5, 'coupon_validity' => now()->addDays(3)],
            ['coupon_name' => 'MEGA15', 'coupon_discount' => 15, 'coupon_validity' => now()->addDays(25)],
            ['coupon_name' => 'DISCOUNT35', 'coupon_discount' => 35, 'coupon_validity' => now()->addDays(14)],
            ['coupon_name' => 'EXTRA12', 'coupon_discount' => 12, 'coupon_validity' => now()->addDays(21)],
            ['coupon_name' => 'SHOPMORE22', 'coupon_discount' => 22, 'coupon_validity' => now()->addDays(17)],
            ['coupon_name' => 'HOLIDAY18', 'coupon_discount' => 18, 'coupon_validity' => now()->addDays(27)],
            ['coupon_name' => 'BDAY50', 'coupon_discount' => 50, 'coupon_validity' => now()->addDays(2)],
            ['coupon_name' => 'SUPER7', 'coupon_discount' => 7, 'coupon_validity' => now()->addDays(11)],
            ['coupon_name' => 'FLASH9', 'coupon_discount' => 9, 'coupon_validity' => now()->addDays(6)],
            ['coupon_name' => 'SPRING16', 'coupon_discount' => 16, 'coupon_validity' => now()->addDays(22)],
            ['coupon_name' => 'WINTER28', 'coupon_discount' => 28, 'coupon_validity' => now()->addDays(8)],
            ['coupon_name' => 'LOYALTY13', 'coupon_discount' => 13, 'coupon_validity' => now()->addDays(19)],
        ];

        foreach ($coupons as $coupon) {
            DB::table('coupons')->insert([
                'coupon_name' => $coupon['coupon_name'],
                'coupon_discount' => $coupon['coupon_discount'],
                'coupon_validity' => $coupon['coupon_validity'],
                'status' =>(string) rand('0', '1'), // 1 = active, 0 = inactive
                'created_at' => now(),
            ]);
        }
    }
}
