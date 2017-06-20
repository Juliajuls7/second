<?php

use Illuminate\Database\Seeder;

class StateServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('state_services')->insert([
        [
          'name' => 'Открыт'
        ],
        [

          'name' => 'Выполняется'
        ],
        [

          'name' => 'Закрыт'
        ]
     ]);
    }
}
