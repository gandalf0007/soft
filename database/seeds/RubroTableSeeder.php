<?php

use Illuminate\Database\Seeder;

class RubroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Soft\Rubro::class, 100)->create();
    }
}
