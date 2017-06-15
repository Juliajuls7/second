<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('subcategories')->insert([
        [
          'name' => 'Математика',
          'category_id' => '1'
        ],
        [
          'name' => 'Химия',
          'category_id' => '1'
        ],
        [
          'name' => 'Физика',
          'category_id'=> '1'
        ],
        [
          'name' => 'Уборка',
          'category_id' => '2'
        ],
        [
          'name' => 'Строительство',
          'category_id' => '2'
        ],
        [
          'name' => 'Кухня',
          'category_id' => '2'
        ],
        [
          'name' => 'Уход',
          'category_id' => '3'
        ],
        [
          'name' => 'Кошки',
          'category_id' => '3'
        ],
        [
          'name' => 'Игрушки',
          'category_id' => '3'
        ]


     ]);
    }
}
