<?php

namespace Database\Factories;

use App\Models\TravelHistory;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TravelHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shipment_id' => Shipment::factory(),
            'status' => $this->faker->randomElement([
                'Picked up',
                'In Transit',
                'Delayed',
                'Delivered'
            ]),
            'feedback' => $this->faker->sentence(),
            'location' => $this->faker->city(),
            'map_link' => $this->faker->url(),
            'timestamp' => $this->faker->dateTime(),
        ];
    }
}
