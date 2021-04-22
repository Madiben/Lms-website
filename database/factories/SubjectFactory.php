<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'           =>  $this->faker->regexify('Subject : ([A-Z]|[a-z]){7}'),
            'semester'       =>  $this->faker->optional()->numberBetween(1,6),
            'credit'         =>  $this->faker->numberBetween(1,5),
            'number-student' =>  $this->faker->numberBetween(1,200),
            'code'           => $this->faker->unique()->regexify('IK-[A-Z]{3}[0-9]{3}'),
            'user_id'     => $this->faker->numberBetween(1,2),
            'description'    => $this->faker->paragraph(),
        ];
    }
}

