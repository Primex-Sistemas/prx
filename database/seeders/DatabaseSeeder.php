<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $sigla = $faker->randomElement(['cms', 'soc']);
        $nome = $faker->randomElement(['camisa', 'calca']);
        foreach (range(1,13000) as $index) {
            DB::table('departamentos')->insert([
                'sigla' => $faker->name($sigla),
                'nome' => $faker->name($nome),
                'descricao' => $faker->username                
            ]);
        }
    }
    
}