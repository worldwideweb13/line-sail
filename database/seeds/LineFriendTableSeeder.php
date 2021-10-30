<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\LineFriend;

class LineFriendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LineFriend::class, 225)->create();
    }
}
