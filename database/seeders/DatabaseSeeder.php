<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use Arr;
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

        Customer::factory(5)
            ->create()
            ->each(function (Customer $item) {
                for ($i = 1; $i < 50; $i++) {
                    $item->orders()
                        ->create([
                            'amount' => random_int(100, 900) * 1000,
                            'status' => Arr::random([
                                'accepted',
                                'in_progress',
                                'done',
                            ])
                        ]);
                }

            });
    }
}
