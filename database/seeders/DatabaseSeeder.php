<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Smartphone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    // comando: php artisan migrate:fresh --seed
    public function run()
    {
        //User::factory(1)->create();
        //Category::factory(1)->create();
        //Database::table('category')->truncate();
        Category::create([
            'name' => 'Smartphone',
            'description' => 'Telefono cellulare con capacità di calcolo, memoria e connessione dati molto più avanzate rispetto ai normali telefoni cellulari, basato su un sistema operativo per dispositivi mobili.'
        ]);
        
        Category::create([
            'name' => 'Computer',
            'description' => 'Anche noto come elaboratore o calcolatore, è una macchina automatizzata programmabile in grado di eseguire sia complessi calcoli matematici (calcolatore) sia altri tipi di elaborazioni dati (elaboratore).',
        ]);
        
        Category::create([
            'name' => 'Smartwatch',
            'description' => 'Chiamati anche orologi intelligenti, sono dei veri e propri computer indossabili.'
        ]);
        
        User::create([
            'name' => 'admin',
            'email' => 'info@mystuff.com',
            'password' => Hash::make('admin1234'),
        ]);
        
        Cart::create([
            'creation_date' => date("Y/m/d"),
            'confirm_date' => null,
            'id_user' => 1,
        ]);
    }
}
