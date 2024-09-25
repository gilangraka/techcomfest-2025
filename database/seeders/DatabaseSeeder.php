<?php

namespace Database\Seeders;

use App\Models\RefGender;
use App\Models\RefKategori;
use App\Models\RefPeserta;
use App\Models\RefTeam;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $kategori = ['Software', 'Network', 'Multimedia'];
        foreach ($kategori as $item) {
            RefKategori::create(['nama_kategori' => $item]);
        }
        $gender = ['Laki - Laki', 'Perempuan'];
        foreach ($gender as $item) {
            RefGender::create(['nama_gender' => $item]);
        }

        $roles = ['Developer', 'IndependenS', 'IndependenM', 'IndependenN', 'Peserta'];
        foreach ($roles as $key => $value) {
            DB::table('roles')->insert([
                'name' => $value,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $user = new User([
            'name' => 'Gilang Raka Ramadhan',
            'email' => 'rakakiki212@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        $user->save();
        $user->assignRole('Developer');
        $ref_peserta = new RefPeserta([
            'user_id' => $user->id,
            'nomor_hp' => '085742089646',
            'gender_id' => 1,
            'kategori_id' => 1
        ]);
        $ref_peserta->save();
    }
}
