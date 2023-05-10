<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Operator;
use App\Models\Partner;
use App\Models\Supplier;


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

        $partners = Partner::factory()->count(10)->create();
        $operators = Operator::factory()->count(10)->create();
        $suppliers = Supplier::factory()->count(10)->create();
    }
}
