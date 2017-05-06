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
            ['id' => 1, 'name' => 'rosita','email' => 'rosita@gmail.com','phone' => '1234567','password' => bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'name' => 'khamila', 'email' => 'khamila@gmail.com', 'phone' => '3456786','password' =>bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'name' => 'siwi', 'email' => 'siwi@gmail.com','phone' => '4567896','password' => bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'name' => 'alfira','email' => 'alfira@gmail.com', 'phone' => '3456789','password' => bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'name' => 'lailatul','email' => 'lailatul@gmail.com','phone' => '5678954','password' => bcrypt('qwerty'),'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'name' => 'dea', 'email' => 'dea@gmail.com','phone' => '5678632','password' => bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('users')->insert($user);
    }
}
