<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Products::class)->create([
            'category_id'   => 3,
            'title_es'      => 'Microcemento Base 28Kgs',
            'text_es'       => '',
            'price'         => '151.00',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 1,
            'active'        => 1,
        ]);

        factory(App\Models\Products::class)->create([
            'category_id'   => 4,
            'title_es'      => 'Microcemento Fino 14Kgs',
            'text_es'       => '',
            'price'         => '89.00',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 1,
            'active'        => 1,
        ]);

        factory(App\Models\Products::class)->create([
            'category_id'   => 4,
            'title_es'      => 'Microcemento Fino 28Kgs',
            'text_es'       => '',
            'price'         => '158.00',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 2,
            'active'        => 1,
        ]);

        factory(App\Models\Products::class)->create([
            'category_id'   => 5,
            'title_es'      => 'Sellador de paredes y suelos Brillo 750Ml.',
            'text_es'       => '',
            'price'         => '36.84',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 1,
            'active'        => 1,
        ]);

        factory(App\Models\Products::class)->create([
            'category_id'   => 5,
            'title_es'      =>  'Sellador de paredes y suelos Brillo 4L.',
            'text_es'       => '',
            'price'         => '138.00',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 2,
            'active'        => 1,
        ]);

        factory(App\Models\Products::class)->create([
            'category_id'   => 5,
            'title_es'      => 'Sellador de paredes y suelos Mate 750Ml.',
            'text_es'       => '',
            'price'         => '35.55',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 3,
            'active'        => 1,
        ]);

        factory(App\Models\Products::class)->create([
            'category_id'   => 5,
            'title_es'      => 'Sellador de paredes y suelos Mate 4L.',
            'text_es'       => '',
            'price'         => '134.00',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 4,
            'active'        => 1,
        ]);

        factory(App\Models\Products::class)->create([
            'category_id'   => 6,
            'title_es'      => 'Microcemento Piscinas 14Kgs.',
            'text_es'       => '',
            'price'         => '90.00',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 1,
            'active'        => 1,
        ]);

        factory(App\Models\Products::class)->create([
            'category_id'   => 6,
            'title_es'      => 'Microcemento Piscinas 28Kgs.',
            'text_es'       => '',
            'price'         => '169.00',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 2,
            'active'        => 1,
        ]);


        factory(App\Models\Products::class)->create([
            'category_id'   => 1,
            'title_es'      => 'Resina Poxi XKgs.',
            'text_es'       => '',
            'price'         => '1.00',
            'discount'      => 0,
            'stock'         => 0,
            'dimension'     => 1,
            'order'         => 1,
            'active'        => 1,
        ]);



    }
}