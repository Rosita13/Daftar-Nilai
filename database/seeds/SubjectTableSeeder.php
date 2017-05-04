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
            ['id' => 1, 'name' => 'MTK','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'name' => 'PKN','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'name' => 'B.ind','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'name' => 'PPKI','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'name' => 'IPA','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'name' => 'IPS','guru_id' => '1','created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('subjects')->insert($subject);
    }
}
