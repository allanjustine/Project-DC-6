<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = file_get_contents('./database/seeders/products.json');
        $data = json_decode($file, true);

        foreach($data['products'] as $product) {
            $cat = $this->checkCategory($product['category']);
            Product::create([
                'name' => $product['title'],
                'brand' => $product['brand'],
                'description' => $product['description'],
                'retail_price' => $product['price'],
                'qty_stock' => $product['stock'],
                'category_id' => $cat->id,
                'thumbnail' => $product['thumbnail']
            ]);
        }
    }

    private function checkCategory($category) {
        $cat = Category::where('name',$category)->first();
        if(!$cat) {
            $cat = Category::create(['name'=>$category,'description'=>$category]);
        }

        return $cat;
    }
}
