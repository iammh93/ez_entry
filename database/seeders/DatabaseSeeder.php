<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    protected $toTruncateTables = [
        'entries',
        'users',
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Model::unguard();
        DB::beginTransaction();
        try {
            foreach($this->toTruncateTables as $table) {
                DB::table($table)->delete();
            }

            $this->call(UserSeeder::class);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
        Model::reguard();
    }
}
