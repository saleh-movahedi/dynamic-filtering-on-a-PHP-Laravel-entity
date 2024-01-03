<?php

namespace Database\Factories;

use App\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        static $counter = 0;
        $codes = [
            '7420101019',
            '5118437458',
            '8100100012',
            '2010001117',
            '5411111013',
        ];

        return [
            'name' => fake()->name(),
            'national_code' => $codes[$counter++],
        ];
    }
}
