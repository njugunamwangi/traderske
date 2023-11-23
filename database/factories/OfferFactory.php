<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Offer;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'service_id' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(2, 0, 999999.99),
            'working_hours' => '{}',
        ];
    }
}
