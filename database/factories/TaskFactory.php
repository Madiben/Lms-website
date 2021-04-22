<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          =>  $this->faker->regexify('Task : ([A-Z]|[a-z]){5}'),
            'deadline'      =>  $this->faker->regexify('2021-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9])T(0[0-9]|1[0-9]|2[0-3]):([0-5][0-9])'),
            'points'        =>  $this->faker->numberBetween(1,100),
            'description'  =>   $this->faker->paragraph(),
            'solution'        => $this->faker->optional()->paragraph(),
        ];
    }
}
