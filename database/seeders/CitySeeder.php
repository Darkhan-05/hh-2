<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->truncate();

        // Добавление данных
        DB::table('cities')->insert([
            ['city_id' => 1, 'name' => 'Город 1','country_id' => 1,'created_at'=> now(),'updated_at'=>now()],
            ['city_id' => 2, 'name' => 'Город 2','country_id' => 2,'created_at'=> now(),'updated_at'=>now()],
            ['city_id' => 3, 'name' => 'Город 3','country_id' => 3,'created_at'=> now(),'updated_at'=>now()],
            // Добавьте другие города по мере необходимости
        ]);
    }
}
