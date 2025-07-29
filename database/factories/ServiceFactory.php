<?php
namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'name'        => $this->faker->word,
            'description' => $this->faker->sentence,
            'price'       => $this->faker->randomFloat(2, 100, 1000),
            'status'      => 'active', // or 'inactive'
        ];
    }
}
