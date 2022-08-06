<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Roles;
use \Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::truncate();

        $roles = [
            [
              // 'id' => Str::uuid()->toString(),
              'slug' => Str::slug('Administrator'),
              'role' => 'Administrator',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              // 'id' => Str::uuid()->toString(),
              'slug' => Str::slug('Admin'),
              'role' => 'Admin',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              // 'id' => Str::uuid()->toString(),
              'slug' => Str::slug('Agen'),
              'role' => 'Agen',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              // 'id' => Str::uuid()->toString(),
              'slug' => Str::slug('User'),
              'role' => 'User',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            // [
            //   'id' => 4,
            //   'nama_role' => 'Komisaris Utama',
            //   'created_at' => Carbon::now(),
            //   'updated_at' => Carbon::now(),
            // ],
            // [
            //   'id' => 5,
            //   'nama_role' => 'Direktur',
            //   'created_at' => Carbon::now(),
            //   'updated_at' => Carbon::now(),
            // ],
            // [
            //   'id' => 6,
            //   'nama_role' => 'Sekretaris',
            //   'created_at' => Carbon::now(),
            //   'updated_at' => Carbon::now(),
            // ],
        ];

        Roles::insert($roles);
    }
}
