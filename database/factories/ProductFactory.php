<?php
namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Generator as Faker;

class ProductFactory extends Factory{
    protected $model = Product::class;
    
    //genero in maniera randomica le tabelle con il faker
    public function definition(){
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(1, 100),
            'capacity' => $this->faker->numberBetween(1, 100),
            'model'=> $this->faker->numberBetween(1, 100),
            'color' => $this->faker->colorName,
            'assurance' => $this->faker->boolean,
            'id_category' => 1
        ];
    }
}
