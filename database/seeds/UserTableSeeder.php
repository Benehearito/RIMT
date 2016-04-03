<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         *
         Para actualizar tablas y seeder
        linea de comandos
        php artisan migrate:refresh -seed
         *
         * Esto es para actualizar solo los seed sin modificar las tablas
        linea de comandos
        php artisan db:seed

        * descometar esto si queremos que borre los registros de la tabla
        DB::table('users')->truncate();
        *
         */
        factory(App\Models\User::class)->create([
            'name'      => 'Yfenche',
            'lastname'   => 'H.R.',
            'dni'       => '42187701C',
            'email'     => 'yfenche@hotmail.com',
            'telephone' => '667337808',
            'role'      => 'admin',
            'password'  =>  bcrypt('123456'),
            'banned'    =>  0,

        ]);
        factory(App\Models\User::class)->create([
            'name'      => 'Yfenche',
            'lastname'   => 'h.r.',
            'dni'       => '42187701C',
            'email'     => 'yfenchehr@gmail.com',
            'telephone' => '667337808',
            'role'      => 'comercial',
            'password'  =>  bcrypt('123456'),
            'banned'    =>  1,
        ]);
        factory(App\Models\User::class, 49)->create();
    }
}
