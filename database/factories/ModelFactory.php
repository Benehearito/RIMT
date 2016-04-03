<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'email'             => $faker->email,
        'name'              => $faker->name,
        'lastname'          => $faker->lastName,
        'dni'               => $faker->postcode,
        'telephone'         => $faker->phoneNumber,
        'password'          => bcrypt(str_random(10)),
        'role'              => 'cliente',
        'banned'            => 0,
        'remember_token'    => str_random(10),
    ];
});

$factory->define(App\Models\Categories::class, function (Faker\Generator $faker) {
    return [
        'category_id'       => 0,
        'title_es'          => $faker->name,
        'text_es'           => $faker->text,
        'order'             => 0,
        'active'            => rand(0,1)
    ];
});

$factory->define(App\Models\Products::class, function (Faker\Generator $faker) {

    return [
        'category_id'       => null,
        'title_es'          => $faker->title,
        'text_es'           => $faker->text,
        'price'             => $faker->numberBetween(10,300),
        'discount'          => $faker->numberBetween(0,20),
        'stock'             => $faker->numberBetween(0,40),
        'dimension'         => $faker->numberBetween(0,1),
        'active'            => rand(0,1)
    ];
});

$factory->define(App\Models\Orders::class, function (Faker\Generator $faker) {
    $user = \App\Models\User::findOrFail(rand(3,15));
    return [
        'user_id'              => $user->id,
        'status'               => $faker->randomElement(  ['carrito','pendientebanco','pago','cancelado', 'enviado' ,'devuelto', 'recibido']),
        'name'                 => $user->name,
        'email'                => $user->email,
        'telephone'            => $user->telephone,
        'name_take'            => $faker->name,
        'email_take'           => $faker->email,
        'telephone_take'       => $faker->phoneNumber,
        'island'               => $faker->randomElement( ['tenerife','grancanaría','lapalma', 'fuerteventura', 'lagomera' ,'lanzarote','elhierro'] ),
        'address'              => $faker->address,
        'postcode'             => $faker->postcode,
        'moreinfo'             => $faker->text,
        'total'                => $faker->numberBetween(1000, 10000),
        'total_shipping'       => $faker->numberBetween(10, 50)
    ];
});

$factory->define(App\Models\OrderProducts::class, function (Faker\Generator $faker) {
    $order = \App\Models\Orders::findOrFail(rand(1,5));
    $product = \App\Models\Products::findOrFail(rand(1,10));
    return [
        'order_id'             => $order->id,
        'product_id'           => $product->id,
        'title_es'             => $product->title_es,
        'quantity'             => $faker->numberBetween(1,10),
        'price'                => $product->price,
        'dimension'          => $product->dimension,

    ];
});

$factory->define(App\Models\Albums::class, function (Faker\Generator $faker) {
    return [
        'title_es'      => $faker->name,
        'album_id'      => $faker->numberBetween(0,10),
        'slug'          => $faker->slug,
        'order'         => $faker->numberBetween(0,10),
    ];
});