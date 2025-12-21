<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tracking_id' => $this->faker->unique()->numerify('AAVX-####-####-####'),
            'recipient_name' => $this->faker->name(),
            'destination' => $this->faker->city(),
            'shipment_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'package_weight' => $this->faker->randomFloat(2, 0.5, 30),
            'reference_number' => $this->faker->unique()->bothify('REF-########'),
            'package_qty' => $this->faker->numberBetween(1, 10),
        ];
    }
}
