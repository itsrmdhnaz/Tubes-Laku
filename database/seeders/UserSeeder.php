<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_id' => "LKAD" . substr("admin", 0, 2) . date('d') . str_pad(User::count() + 1, 4, '0', STR_PAD_LEFT),
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123321123'),
            'remember_token' => null,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'gender' => "L",
            'role' => 1,
            'avatar' => "avatar_p.svg",
        ]);

        DB::table('users')->insert([
            'user_id' => "LKPD" . substr("admin", 0, 2) . date('d') . str_pad(User::count() + 1, 4, '0', STR_PAD_LEFT),
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123321123'),
            'email_verified_at' => Carbon::now(),
            'remember_token' => null,
            'gender' => "L",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'role' => 0,
            'avatar' => "avatar_p.svg",
        ]);

        DB::table('users')->insert([
            'user_id' => "LKKR" . substr("admin", 0, 2) . date('d') . str_pad(User::count() + 1, 4, '0', STR_PAD_LEFT),
            'name' => 'kurir',
            'email' => 'kurir@gmail.com',
            'password' => Hash::make('123321123'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'remember_token' => null,
            'gender' => "L",
            'role' => 2,
            'avatar' => "avatar_p.svg",
        ]);
        //push
    }
}
