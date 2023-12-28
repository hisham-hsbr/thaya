<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(DeveloperUserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(DeveloperSettingsSeeder::class);
        $this->call(AppSettingsSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(TimeZoneSeeder::class);
        $this->call(BloodSeeder::class);
        $this->call(CountryStateDistrictCitySeeder::class);
    }
}
