<?php

namespace Database\Factories;

use App\Enums\TaskStatus;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'title' => fake()->words(3, true),
            'description' => fake()->sentences(3, true),
            'deadline' => fake()->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            'status' => fake()->randomElement(TaskStatus::cases()),
        ];
    }
}
