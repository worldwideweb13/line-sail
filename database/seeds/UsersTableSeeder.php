<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('users')->insert([
            'name' => 'スーパー管理者',
            'role' => 'super_admin',
            'email' => 'superAdmin@test.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'name' => '管理者',
            'role' => 'admin',
            'email' => 'admin@test.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'name' => '一般ユーザー',
            'role' => 'user',
            'email' => 'user@test.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}