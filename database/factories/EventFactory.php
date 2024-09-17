<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_by' => User::factory()->create()->id,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'local' => $this->faker->company,
            'workload' => rand(1, 10)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            $users = User::factory()->count(rand(5, 20))->create();
            $event->participants()->attach($users);
        });
    }
}
