<?php

use Illuminate\Database\Seeder;

class table_users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate record
        DB::table('users')->truncate();

        $user = [
            ['id' => 1, 'name' => 'lala','email' => 'lala@gmail.com','phone' => '1234567','password' => '1234567', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'name' => 'lili', 'email' => 'lili@gmail.com', 'phone' => '3456786','password' => '1234567', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'name' => 'lulu', 'email' => 'lulu@gmail.com','phone' => '4567896','password' => '1234567', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'name' => 'kaka','email' => 'kaka@gmail.com', 'phone' => '3456789','password' => '1234567', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'name' => 'kiki','email' => 'kiki@gmail.com','phone' => '5678954','password' => '1234567', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'name' => 'kuku', 'email' => 'kuku@gmail.com','phone' => '5678632','password' => '1234567', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('users')->insert($user);
    }
}
