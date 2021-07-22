<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = array(
            ['name' => 'Sand Dollar', 'color' => '#DECDBE', 'pantone' => '13-1106', 'year' => '2020'],
            ['name' => 'Airy blue', 'color' => '#93b6d6', 'pantone' => '14-4122', 'year' => '2019'],
            ['name' => 'Aurora Red', 'color' => '#b93a33', 'pantone' => '18-1550', 'year' => '2019'],
            ['name' => 'Bordacious', 'color' => '#b86ba3', 'pantone' => '17-3240', 'year' => '2019'],
            ['name' => 'Dusty Cedar', 'color' => '#ad5d5e', 'pantone' => '18-1630', 'year' => '2019'],
            ['name' => 'Lush Meadow', 'color' => '#106f51', 'pantone' => '18-5845', 'year' => '2019'],
            ['name' => 'Potters Clay', 'color' => '#9e4523', 'pantone' => '18-1340', 'year' => '2019'],
            ['name' => 'Riverside', 'color' => '#4d6a92', 'pantone' => '17-4028', 'year' => '2019'],
            ['name' => 'Sharkskin', 'color' => '#838488', 'pantone' => '17-3914', 'year' => '2019'],
            ['name' => 'Warm Taupe', 'color' => '#af9483', 'pantone' => '16-1318', 'year' => '2019'],
            ['name' => 'Spicy Mustard', 'color' => '#d9ae46', 'pantone' => '14-0952', 'year' => '2019'],
            ['name' => 'Sulphur Spirit', 'color' => '#d6db26', 'pantone' => '13-0650', 'year' => '2019'],
        );
        //  No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        //  Vacia los registros
        DB::table('colors')->truncate();

        //  Inserta los registros
        foreach ($colors as $item) {
            DB::table('colors')->insert($item);
        }
    }
}
