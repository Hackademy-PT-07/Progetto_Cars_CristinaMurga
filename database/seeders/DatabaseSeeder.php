<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        $this->brands();
        $this->cars();
        $this->extras();
    }


    private function brands()
    {
        \App\Models\Brand::create(['name'=> 'Alfa Romeo']);
        \App\Models\Brand::create(['name'=> 'Audi']);
        \App\Models\Brand::create(['name'=> 'BMW']);
        \App\Models\Brand::create(['name'=> 'Fiat']);
        \App\Models\Brand::create(['name'=> 'Ferrari']);
        \App\Models\Brand::create(['name'=> 'Tesla']);
    }

    private function cars(){
        $engines = ['Benzina', 'Diesel', 'Elettrico'];
        
        \App\Models\Car::create([
            'brand_id' => 1,
            'model' => 'Giulia',
            'engine' => $engines[0],
            'price' => 25000
        ]);
        \App\Models\Car::create([
            'brand_id' => 2,
            'model' => 'A4',
            'engine' => $engines[0],
            'price' => 30000
        ]);
        \App\Models\Car::create([
            'brand_id' => 4,
            'model' => 'Panda',
            'engine' => $engines[1],
            'price' => 30000
        ]);
        \App\Models\Car::create([
            'brand_id' => 5,
            'model' => 'Roma',
            'engine' => $engines[0],
            'price' => 200000,
        ]); 

        \App\Models\Car::create([
            'brand_id' => 6,
            'model' => 'Model S',
            'engine' => $engines[2],
            'price' => 100000,
        ]); 
        \App\Models\Car::create([
            'brand_id' => 3,
            'model' => '330',
            'engine' => $engines[1],
            'price' => 40000,
        ]); 
    }
    private function extras(){
        
        \App\Models\Extra::create(['name'=> 'Navigatore', 'price'=> 2000]);
        \App\Models\Extra::create(['name'=> 'Cambio automatico', 'price'=> 2500]);
        \App\Models\Extra::create(['name'=> 'Sensori di parcheggio', 'price'=> 800]);
        \App\Models\Extra::create(['name' => 'Sedili in pelle', 'price' => 1800]);
        \App\Models\Extra::create(['name' => 'Fari a led', 'price' => 1500]);
    }
}
