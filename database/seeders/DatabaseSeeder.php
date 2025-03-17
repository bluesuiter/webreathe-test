<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Modules;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 0,
            'name' => 'System Administrator',
            'email' => 'system-admin@example.com',
            'password' => 'pa55w0rd@example.com',
            'active_fl' => true,
            'created_by' => 0,
        ]);

        $modules = [[
            'name' => 'MODPF1',
            'sr_no' => 'CMR5345UREI434',
            'mtbf' => 1600000,
            'min_operating_temp' => -25,
            'max_operating_temp' => 40,
            'created_by' => 1,
        ], [
            'name' => 'MODPF2',
            'sr_no' => 'MEWRE43452345OPER',
            'mtbf' => 1600000,
            'min_operating_temp' => -25,
            'max_operating_temp' => 38,
            'created_by' => 1,
        ], [
            'name' => 'MODPF3',
            'sr_no' => 'KLER530245PORE',
            'mtbf' => 1600000,
            'min_operating_temp' => -15,
            'max_operating_temp' => 35,
            'created_by' => 1,
        ]];

        foreach ($modules as $module) {
            Modules::create($module);
        }
    }
}
