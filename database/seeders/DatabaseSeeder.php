<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Kandidat;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $faker = Faker::create('id');
        Admin::create([
            'level' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('password45102'),
        ]);

        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '2122070145',
            'nisn' => '0065795431',
            'username' => 'Ahmad Faliansyah',
            'password' => '2122070145',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI BCF 2',
            'nis' => '2122070146',
            'nisn' => '3062471500',
            'username' => 'Amelia Putri Sulaeman',
            'password' => '2122070146'
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'X PPLG 2',
            'nis' => '2122070147',
            'nisn' => '0069148715',
            'username' => 'Andi Abdul Rahman',
            'password' => '2122070147',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'X Animasi 2',
            'nis' => '2122070148',
            'nisn' => '0063646206',
            'username' => 'Ariyanto Hermawan',
            'password' => '2122070148',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI Animasi 2',
            'nis' => '2122070149',
            'nisn' => '0061273028',
            'username' => 'Cindy Mahardini',
            'password' => '2122070149',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '2122070150',
            'nisn' => '0063820760',
            'username' => 'Claymmnent Ananda',
            'password' => '2122070150',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'X BCF 1',
            'nis' => '2122070151',
            'nisn' => '0056524385',
            'username' => 'Destyara Hesmi Virlandra',
            'password' => '2122070151',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '2122070152',
            'nisn' => '0063484199',
            'username' => 'Dinda Amelia Putri',
            'password' => '2122070152',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 3',
            'nis' => '2122070153',
            'nisn' => '0058757652',
            'username' => 'Dwi Astuti',
            'password' => '2122070153',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '2122070154',
            'nisn' => '0069711346',
            'username' => 'Eva Muzdalifah',
            'password' => '2122070154',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '2122070155',
            'nisn' => '0062538481',
            'username' => 'Falih Fadhli',
            'password' => '2122070155',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '2122070156',
            'nisn' => '006253881',
            'username' => 'Firyal Syifa Salsabila',
            'password' => '2122070156',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '2122070157',
            'nisn' => '00678044649',
            'username' => 'Hafiz Miftahul Fikry',
            'password' => '2122070157',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '2122070158',
            'nisn' => '0067804649',
            'username' => 'Ibaddurahman',
            'password' => '2122070158',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI BCF 2',
            'nis' => '21220070159',
            'nisn' => '0052330836',
            'username' => 'Iqbal Bayhaqi Firdaus',
            'password' => '21220070159',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI BCF 2',
            'nis' => '21220070160',
            'nisn' => '0067090329',
            'username' => 'Maileni',
            'password' => '21220070160',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI BCF 2',
            'nis' => '21220070161',
            'nisn' => '0058528862',
            'username' => 'Muhamad Adi Yaksya',
            'password' => '21220070161',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI BCF 2',
            'nis' => '21220070162',
            'nisn' => '0065685223',
            'username' => 'Muhamad Alvin Aprian',
            'password' => '21220070162',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI BCF 2',
            'nis' => '21220070163',
            'nisn' => '0067234302',
            'username' => 'Muhammad Angga Saputra',
            'password' => '21220070163',
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI BCF 2',
            'nis' => '21220070164',
            'nisn' => '0053942213',
            'username' => 'Muhammad Fikri',
            'password' => bcrypt('21220070164'),
        ]);
        User::create([
            'level' => 'siswa',
            'kelas' => 'XI PPLG 2',
            'nis' => '1234567890',
            'nisn' => '0061009003',
            'username' => 'Muhammad Rafli Febrian',
            'password' => '1234567890',
        ]);
    }
}
