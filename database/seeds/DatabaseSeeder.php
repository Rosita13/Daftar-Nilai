<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(ValueTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
    }
}
