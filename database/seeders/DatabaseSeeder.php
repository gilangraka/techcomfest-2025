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
        $kategori = ['Web Design', 'UI/UX Design', 'Capture the Flag'];
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

        $permissions = ['Manage User', 'Manage Team', 'Manage Independent', 'Manage', 'Hasil Multimedia', 'Hasil Network', 'Hasil Software', 'Hasil Karya', 'Team'];
        foreach ($permissions as $key => $value) {
            DB::table('permissions')->insert([
                'name' => $value,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $role_has_permissions = [
            '1' => ['1', '2', '3', '4', '5', '6', '7', '8'],
            '2' => ['2', '4', '7', '8'],
            '3' => ['2', '4', '6', '8'],
            '4' => ['2', '4', '5', '8'],
            '5' => ['9']
        ];
        foreach ($role_has_permissions as $role_id => $permissions) {
            foreach ($permissions as $permission_id) {
                DB::table('role_has_permissions')->insert([
                    'permission_id' => $permission_id,
                    'role_id' => $role_id
                ]);
            }
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
