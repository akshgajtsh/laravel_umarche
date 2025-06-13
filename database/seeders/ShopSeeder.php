<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert(
            [
                [
                    'owner_id' => 1,
                    'name' => '店名',
                    'information' => '情報',
                    'filename' => '',
                    'is_selling' => true,
                ],

                [
                    'owner_id' => 2,
                    'name' => '店名',
                    'information' => '情報',
                    'filename' => '',
                    'is_selling' => true,
                ],
            ]
        );
    }
}
