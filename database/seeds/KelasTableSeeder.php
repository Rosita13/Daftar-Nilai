<?php


use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate record
        DB::table('classes')->truncate();

        $kelas = [
            ['id' => 1, 'guru_id' => '1','class'=>'RPL', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'guru_id' => '2','class'=>'RPL', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'guru_id' => '3','class'=>'RPL', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'guru_id' => '4','class'=>'RPL', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'guru_id' => '5','class'=>'RPL', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'guru_id' => '6','class'=>'RPL', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('classes')->insert($kelas);
    }
}
