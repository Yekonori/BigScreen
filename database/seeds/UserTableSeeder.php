<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Insert inside the `users` table a user where : 
         *  - name => admin
         *  - email => admin@admin.fr
         *  - password => admin
         */
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.fr',
                'password' => Hash::make('admin') // crypted password
            ]
        ]);
    }
}
