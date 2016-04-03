<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Orders::class,5)->create();
        factory(App\Models\OrderProducts::class, 40)->create();
    }
}
