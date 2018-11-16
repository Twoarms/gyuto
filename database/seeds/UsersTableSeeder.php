<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'UserAdmin',
            'email' => 'xxxxxx@gmail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => Carbon::now(),
            'type' => 'admin',
        ]);
    }
}
