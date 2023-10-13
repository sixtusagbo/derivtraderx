<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentAdd>
 */
class PaymentAddFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Bitcoin',
            'address' => 'hugelongblahblah',
            'symbol' => 'BTC',
            'network' => 'BTC'
        ];
    }
}
