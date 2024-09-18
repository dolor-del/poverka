<?php

namespace Database\Factories;

use App\Models\Meter;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MeterFactory extends Factory
{
    protected $model = Meter::class;

    public function definition(): array
    {
        return [
            'doc_number' => $this->faker->word(),
            'state_register' => $this->faker->word(),
            'meter_number' => $this->faker->word(),
            'modification' => $this->faker->word(),
            'temperature' => $this->faker->randomFloat(),
            'date_contract' => Carbon::now(),
            'date_expire' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'order_id' => Order::factory(),
        ];
    }
}
