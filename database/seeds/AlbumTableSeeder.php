<?php

use Illuminate\Database\Seeder;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Albums::class)->create([
            'album_id'  => 0,
            'title_es'  => 'Microcemento',
            'slug'      => 'micro',
            'order'     => 1,
        ]);
        factory(App\Models\Albums::class)->create([
            'album_id'  => 0,
            'title_es'  => 'Cocinas y Baños',
            'slug'      => 'cocinasybanos',
            'order'     => 2,
        ]);
        factory(App\Models\Albums::class)->create([
            'album_id'  => 0,
            'title_es'  => 'Fachadas, Muros y Pavimentos',
            'slug'      => 'fachcadasymuros',
            'order'     => 3,
        ]);
        factory(App\Models\Albums::class)->create([
            'album_id'  => 0,
            'title_es'  => 'Impermeabilizaciones y Techos',
            'slug'      => 'imperytechos',
            'order'     => 4,
        ]);
        factory(App\Models\Albums::class)->create([
            'album_id'  => 0,
            'title_es'  => 'Jardines y Barbacoas',
            'slug'      => 'jardybarba',
            'order'     => 5,
        ]);
        factory(App\Models\Albums::class)->create([
            'album_id'  => 0,
            'title_es'  => 'Decoración y Nuevas Tecnologías',
            'slug'      => 'decoytec',
            'order'     => 6,
        ]);
    }
}
