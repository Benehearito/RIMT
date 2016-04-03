<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Models\Categories::class)->create([
            'category_id'   => 0,
            'title_es'      => 'Microcemento',
            'text_es'       => 'Es un revestimiento compuesto por una base cementicia de alta calidad mezclado con polimeros, áridos y pigmentos colorantes, de gran adeherencia a todo tipo de superficies. Se extiende en la superficie obteniendo como resultado un recrecido de 2 a 3mm de gran originalidad, con unas características que lo hacen idóneo para recubrimiento de superficies de hormigón nuevo,DM ,cristal , rehabilitación de pavimentos de hormigón viejo, gres, azulejos, yeso, pladur, metal, plastico, mármol, etc...',
            'order'         => 1,
            'active'        => 1,

        ]);

        factory(App\Models\Categories::class)->create([
            'category_id'   => 0,
            'title_es'      => 'Resina',
            'text_es'       => '',
            'order'         => 2,
            'active'        => 1,
        ]);

        factory(App\Models\Categories::class)->create([
            'category_id'   => 1,
            'title_es'      => 'Microcemento Base',
            'text_es'       => 'Es un revestimiento de grano medio relleno primera base, compuesto por una base cementicia de alta calidad mezclado con polímeros, áridos y pigmentos colorantes, con una gran adherencia a todo tipo de superficies',
            'order'         => 1,
            'active'        => 1,

        ]);

        factory(App\Models\Categories::class)->create([
            'category_id'   => 1,
            'title_es'      => 'Microcemento Fino',
            'text_es'       => 'Es un revestimiento de grano fino para terminación, compuesto de una base cementicia de alta calidad mezcldo con polímeros, áridos y pigmentos colorantes y con una gran adherencia a todo tipo de superficies.',
            'order'         => 2,
            'active'        => 1,
        ]);

        factory(App\Models\Categories::class)->create([
            'category_id'   => 1,
            'title_es'      => 'Sellador de paredes y suelos trafico intenso',
            'text_es'       => 'Sellador para microcemento de acabado brillante, satinado y mate al disolvente para paredes y suelos con tráfico intenso. Recomendado para el mantenimiento de microcementos expuestos a transito intenso o zonas verticales, horizontales, sellados de piscinas, ect. Alto poder de dureza y muy buena resitencia al rallado',
            'order'         => 3,
            'active'        => 1,
        ]);

        factory(App\Models\Categories::class)->create([
            'category_id'   => 1,
            'title_es'      => 'Microcemento Piscinas',
            'text_es'       => 'Es un revestimiento especial para exteriores en inmersión, compuesto por una base cementicia de alta calidad mezclado con polímeros, áridos y pigmentos colorantes, con una gran adherencia a todo tipo de superficies. Se extiende en la superficie obteniendo como resultado un recrecido de 2 a 3 Mm',
            'order'         => 4,
            'active'        => 1,
        ]);

        factory(App\Models\Categories::class)->create([
            'category_id'   => 2,
            'title_es'      => 'Resina Poxi',
            'text_es'       => '',
            'order'         => 1,
            'active'        => 1,
        ]);
    }
}
