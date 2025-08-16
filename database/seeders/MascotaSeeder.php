<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Mascota;

class MascotaSeeder extends Seeder
{
    public function run()
    {
        Mascota::insert([
            [
                'nombre' => 'Luna',
                'raza' => 'Labrador',
                'descripcion' => 'Luna es una perrita labrador de 3 años, muy cariñosa, sociable y llena de energía. Le encanta correr en el parque, jugar con pelotas y recibir caricias',
                'disponible' => true,
                'imagen' => 'Luna.jpg', 
             
            ],
            [
                'nombre' => 'Max',
                'raza' => 'Pastor Alemán',
                'descripcion' => 'Max es un pastor alemán de 4 años, muy protector y obediente. Está entrenado para seguir órdenes básicas y le encanta acompañar en caminatas largas.',
                'disponible' => true,
                'imagen' => 'Max.jpeg', 
              
            ],
   [
                'nombre' => 'Milo',
                'raza' => 'Beagle',
                'descripcion' => 'Milo es un beagle curioso, juguetón y siempre con la nariz en el suelo buscando aventuras. Es perfecto para familias con niños por su carácter alegre.',
                'disponible' => true,
                'imagen' => 'Milo.jpg', 
           
            ],
            [
                'nombre' => 'Nala',
                'raza' => 'Mestiza',
                'descripcion' => 'Nala es una perrita mestiza de carácter tranquilo y muy leal. Ideal para hogares que buscan una compañera fiel que se adapte fácilmente al entorno.',
                'disponible' => true,
                'imagen' => 'Nala.jpg', 
                
            ],
            [
                'nombre' => 'Niño',
                'raza' => 'Schnauzer',
                'descripcion' => 'Niño es un perrito muy cariñoso y muy leal.',
                'disponible' => true,
                'imagen' => 'Niño.jpeg', 

            ]
        ]);
}
}
