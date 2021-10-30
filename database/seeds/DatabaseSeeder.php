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
        $this->call(LineChannelTableSeeder::class);
        $this->call(PushMessageTableSeeder::class);
        $this->call(LineFriendTableSeeder::class);
    }
}
