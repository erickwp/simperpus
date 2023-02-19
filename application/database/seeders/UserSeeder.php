<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'role_id' => 1,
            'email' => 'admin@simperpus.com',
            'password' => bcrypt('12345678'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('user_informations')->insert([
            'user_id' => $user->id,
            'name' => 'Admin SIM Perpus',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
