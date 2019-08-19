<?php

use Illuminate\Database\Seeder;

class EntradasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entrada::class,300)->create()->each(function(App\Entrada $entrada){
            $entrada->etiquetas()->attach([
                rand(1,5),
                rand(6,14),
                rand(15,20),
            ]);
        });
    }
}
