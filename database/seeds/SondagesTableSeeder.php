<?php

use Illuminate\Database\Seeder;

class SondagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sondages::class, 1)->create();
    }
}
