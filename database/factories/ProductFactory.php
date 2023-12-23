<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   // $category=>Category::pluck('id)->toArray();
        return [
            'name'=>$this->faker->sentence(rand(0,4)), //  بولد كلمات
            'description'=>$this->faker->paragraph(rand(1,6)),
            // 'price '=>$this->faker->randomNumber(999) +1 ,
            //category_id => array-rand($category),
        ];
    }
}
