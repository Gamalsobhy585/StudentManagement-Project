<?php

namespace Database\Factories;

use App\Models\Batch;
use Illuminate\Database\Eloquent\Factories\Factory;

class BatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Batch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'course_id' => function () {
                return \App\Models\Course::factory()->create()->id;
            },
            'start_date' => $this->faker->dateTimeBetween('-1 year', '+1 month'),
        ];
    }
}
