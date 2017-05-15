<?php


use Illuminate\Database\Seeder;

class ValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate record
        DB::table('values')->truncate();

        $value = [
            ['id' => 1, 'nis' => 23456789, 'siswa_id' => '1234567', 'type'=>'tugas','status' => 'remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nis' => 23456789,  'siswa_id'=> '1234567', 'type' => 'UTS2', 'status'=> 'remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'nis' => 23456789,  'siswa_id'=> '1234567', 'type' => 'UTS3', 'status'=> 'remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'nis' => 23456789, 'siswa_id' => '1234567', 'type'=> 'UTS4','status' => 'remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'nis' => 23456789,  'siswa_id'=> '1234567', 'type' => 'UTS5','status' => 'remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'nis' => 23456789,  'siswa_id'=> '1234567', 'type' => 'UTS6', 'status'=> 'remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('values')->insert($value);
    }
}
