<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'John',
            'email' => 'admin@demo.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
