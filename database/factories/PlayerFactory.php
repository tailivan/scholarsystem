<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'poste_id'=> rand(1, 3),
            'team_id' => rand(1, 10),
            'fname'   => $this->faker->firstName(),
            'lname'   => $this->faker->lastName(),
            'cat' => 'U13',
            'age' => rand(11, 14),
            'taille' => rand(140, 160)
        ];
    }
}
