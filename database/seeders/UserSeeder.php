<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            ['name' => 'admin', 'password' => 'xWXd5@!xg!!uiUZ4', 'rol' => 'admin', 'estatus' => 'vig'],
            ['name' => 'user1', 'password' => 'sDJ^4Fa6$h#p7J7L', 'rol' => 'cliente', 'estatus' => 'vig']
        );
        //  No verfica las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        //  Vacia los registros
        DB::table('users')->truncate();

        //  Inserta los registros
        foreach ($users as $item) {
            DB::table('users')->insert($item);
        }
    }
}
