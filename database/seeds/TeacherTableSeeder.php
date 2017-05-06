<?php


use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate record
        DB::table('teachers')->truncate();

        $teacher = [
            ['id' => 1, 'name' => 'rosita', 'nip' => 11111111 ,'created_at'=> \Carbon\Carbon::now()],
            ['id' => 2, 'name' => 'khamilatul', 'nip' => 11111112 ,'created_at'=> \Carbon\Carbon::now()],
            ['id' => 3, 'name' => 'siwi', 'nip' => 11111113 ,'created_at'=> \Carbon\Carbon::now()],
            ['id' => 4, 'name' => 'alfira', 'nip' => 11111114 ,'created_at'=> \Carbon\Carbon::now()],
            ['id' => 5, 'name' => 'lailatul', 'nip' => 11111115 ,'created_at'=> \Carbon\Carbon::now()],
            ['id' => 6, 'name' => 'dea', 'nip' => 11111116 ,'created_at'=> \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('teachers')->insert($teacher);
    }
}
