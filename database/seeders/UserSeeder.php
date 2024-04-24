<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {
            User::truncate();

            User::create(
                  [
                        'name' => 'Super Admin',
                        'email' => 'super.admin@gmail.com',
                        'password' => bcrypt('12345678'),
                        'remember_token' => Str::random(10),
                  ]
            );
      }
}
