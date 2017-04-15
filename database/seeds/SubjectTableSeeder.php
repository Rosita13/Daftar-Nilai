<?php


use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate record
        DB::table('subjects')->truncate();

        $subject = [
            ['id' => 1, 'name' => 'lala','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'name' => 'lili','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'name' => 'lulu','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'name' => 'kaka','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'name' => 'kiki','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'name' => 'kuku','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('subjects')->insert($subject);
    }
}
