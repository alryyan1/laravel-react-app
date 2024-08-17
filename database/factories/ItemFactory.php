<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $section =  Section::first();
        return [
            'section_id'=>$section->id,
            'name'=>$this->faker->name,
            'require_amount'=>0,
            'initial_balance'=>0,
        ];
    }
}
