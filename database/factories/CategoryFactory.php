<?php
namespace Database\Factories;

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory{
    protected $model = Category::class;
    
    //genero in maniera randomica le tabelle con il faker
    
    public function definition(){
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(rand(1,5)) //frase con min 1 max 5 parole 
        ];
    }
    /*
    public function definition(){
        return [
            'name' => 'Smartphone',
            'description' => 'Telefono cellulare con capacità di calcolo, memoria e connessione dati molto più avanzate rispetto ai normali telefoni cellulari, basato su un sistema operativo per dispositivi mobili.'
        ];
    }*/
}

