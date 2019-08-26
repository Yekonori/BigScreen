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
        /**
         * Create 1 Sondage with the Factory value
         */
        factory(App\Sondages::class, 1)->create();
    }
}
