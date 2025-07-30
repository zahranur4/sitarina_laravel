<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Chocolate',
            'subtitle' => 'Mille Crepes',
            'price' => 14000,
            'image_path' => 'img/Chocolate.png'
        ]);

        Product::create([
            'name' => 'Strawberry',
            'subtitle' => 'Mille Crepes',
            'price' => 14000,
            'image_path' => 'img/Stro.png'
        ]);
        
        Product::create([
            'name' => 'Green Tea',
            'subtitle' => 'Mille Crepes',
            'price' => 14000,
            'image_path' => 'img/GT.png'
        ]);

        Product::create([
            'name' => 'Blueberry',
            'subtitle' => 'Mille Crepes',
            'price' => 14000,
            'image_path' => 'img/Blueberry.png'
        ]);

        Product::create([
            'name' => 'Cookies and Cream',
            'subtitle' => 'Mille Crepes',
            'price' => 14000,
            'image_path' => 'img/CNC.png'
        ]);

        Product::create([
            'name' => 'Peanut Butter and Cheese',
            'subtitle' => 'Mille Crepes',
            'price' => 14000,
            'image_path' => 'img/PBnC.png'
        ]);
        
        Product::create([
            'name' => 'Red Velvet',
            'subtitle' => 'Mille Crepes',
            'price' => 14000,
            'image_path' => 'img/Red Velvet.png'
        ]);

        Product::create([
            'name' => 'Blueberry Cream Cheese',
            'subtitle' => 'Mille Crepes',
            'price' => 14000,
            'image_path' => 'img/Blueberry Cream Cheese.png'
        ]);
        
        Product::create([
            'name' => 'Blueberry',
            'subtitle' => 'Whole Cake',
            'price' => 120000,
            'image_path' => 'img/Blueberry.png'
        ]);
        
        Product::create([
            'name' => 'Chocolate',
            'subtitle' => 'Whole Cake',
            'price' => 120000,
            'image_path' => 'img/Chocolate.png'
        ]);

        Product::create([
            'name' => 'Cookies and Cream',
            'subtitle' => 'Whole Cake',
            'price' => 120000,
            'image_path' => 'img/CNC.png'
        ]);

        Product::create([
            'name' => 'Red Velvet',
            'subtitle' => 'Whole Cake',
            'price' => 120000,
            'image_path' => 'img/Red Velvet.png'
        ]);

    }
}
