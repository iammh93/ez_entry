<?php

namespace Database\Seeders;

use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user_data = [
            0 => [
                "name" => "ez_admin",
                "email" => "testing@gmail.com",
                "password" => "123456"
            ]
        ];

        DB::beginTransaction();
        try {
            foreach($user_data as $user) {
                User::create([
                    "name" => $user["name"],
                    "email" => $user["email"],
                    "password" => Hash::make($user["password"]),
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
