<?php

use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            [
                'id' => 1,
                'name' => 'Chien',
                'type'=>"Mammifère",
                'fur'=>"de plusieurs couleurs et doux",
                'feathers' => null,
                'scale' => null,
                'color' => "table-primary"
            ],
            [
                'id' => 2,
                'name' => 'Vipère',
                'type'=>"Reptile",
                'fur'=>null,
                'feathers' => null,
                'scale' => "souples et vertes",
                'color' => "table-success"
            ],
            [
                'id' => 3,
                'name' => 'Hibou',
                'type'=>"Oiseau",
                'fur'=>null,
                'feathers' => "marrons et douces",
                'scale' => null,
                'color' => "table-danger"
            ],
            [
                'id' => 4,
                'name' => 'Alligator',
                'type'=> "Reptile",
                'fur'=>null,
                'feathers' => null,
                'scale' => "dures",
                'color' => "table-success"
            ]
        ]);
    }
}
