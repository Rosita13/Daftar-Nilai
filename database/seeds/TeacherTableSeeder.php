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
            ['id' => 1, 'name' => 'lala','created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'name' => 'lili','created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'name' => 'lulu','created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'name' => 'kaka','created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'name' => 'kiki','created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'name' => 'kuku','created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('teachers')->insert($teacher);
    }
}
