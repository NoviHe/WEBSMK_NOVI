<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(KategoriArtikelTableSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(ArtikelTableSeeder::class);
        $this->call(PengumumanTableSeeder::class);
        $this->call(GuruTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(MataPelajaranTableSeeder::class);
        $this->call(PresensiTableSeeder::class);
        $this->call(NilaiTableSeeder::class);
        $this->call(PpdbTableSeeder::class);
    }
}
