<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    protected string $title;

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function definition(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
