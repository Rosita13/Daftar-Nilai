<?php


use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate record
        DB::table('students')->truncate();

        $student = [
            ['id' => 1, 'nis' => 12345678, 'name' => 'rosita', 'class' => '1','email' => 'rosita@gmail.com','phone' => '1234567','users_id' => '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nis' => 12345678, 'name' => 'khamilatul', 'class' => '2', 'email' => 'khamilatul@gmail.com', 'phone' => '3456786','users_id' => '2','created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'nis' => 12345678, 'name' => 'siwi', 'class' => '3', 'email' => 'siwi@gmail.com','phone' => '4567896','users_id' => '3', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'nis' => 12345678, 'name' => 'alfira', 'class' => '1','email' => 'alfira@gmail.com', 'phone' => '3456789','users_id' => '4', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'nis' => 12345678, 'name' => 'lailatul', 'class' => '2','email' => 'lailatul@gmail.com','phone' => '5678954','users_id' => '5', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'nis' => 12345678, 'name' => 'dea', 'class' => '3', 'email' => 'dea@gmail.com','phone' => '5678632','users_id' => '6', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('students')->insert($student);
    }
}
