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
            ['id' => 1, 'siswa_id' => '1234567', 'type'=>'tugas','status' => 'Remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2,  'siswa_id'=> '1234567', 'type' => 'UTS2', 'status'=> 'Remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3,  'siswa_id'=> '1234567', 'type' => 'UTS3', 'status'=> 'Remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'siswa_id' => '1234567', 'type'=> 'UTS4','status' => 'Remidi','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5,  'siswa_id'=> '1234567', 'type' => 'UTS5','status' => 'Lulus','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6,  'siswa_id'=> '1234567', 'type' => 'UTS6', 'status'=> 'Lulus','nilai'=>80, 'semester'=>1, 'mapel_id'=> '1','class_id'=> '1', 'created_at' => \Carbon\Carbon::now()],
        ];

        // insert batch
        DB::table('values')->insert($value);
    }
}
