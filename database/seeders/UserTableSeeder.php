<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = User::where('role','2')->count();

        if ($count == 0) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@sheesha.com',
                'password' => bcrypt('12345678'),
                'role' => '2',
            ]);
        }
    }
}
