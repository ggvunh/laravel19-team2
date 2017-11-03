<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TableMenusSeeder::class);
        $this->call(TableCategoriesSeeder::class);
        $this->call(TableBrandsSeeder::class);
        $this->call(Table_Products_Seeder::class);
    }
}

class TableMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('menus')->insert([
        ['id' =>1, 'name' => 'Guitar'],
        ['id' =>2, 'name' => 'Bass'],
        ['id' =>3, 'name' => 'Amp/effect'],
        ['id' =>4, 'name' => 'Drum/perc'],
        ['id' =>5, 'name' => 'Keyboard/piano'],
        ['id' =>6, 'name' => 'danh muc 1'],
        ['id' =>7, 'name' => 'danh muc 1'],
        ['id' =>8, 'name' => 'danh muc 1'],
        ['id' =>9, 'name' => 'danh muc 1']
      ]);
    }
}

class TableCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        ['id' =>1, 'name' => 'Electric Guitar', 'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33', 'menu_id' => 1],
        ['id' =>2, 'name' => 'Acoustic Guitar', 'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33', 'menu_id' => 1],
        ['id' =>3, 'name' => 'Bass', 'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33', 'menu_id' => 2],
        ['id' =>4, 'name' => 'Amp/effect', 'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33', 'menu_id' => 4],
      ]);
    }
}

class TableBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('brands')->insert([
        ['id' =>1, 'name' => 'Logo_brand1', 'logo' => 'Logo_brand1.png'],
        ['id' =>2, 'name' => 'Logo_brand2', 'logo' => 'Logo_brand2.png'],
        ['id' =>3, 'name' => 'Logo_brand3', 'logo' => 'Logo_brand3.png'],
        ['id' =>4, 'name' => 'Logo_brand4', 'logo' => 'Logo_brand4.png'],
      ]);
    }
}


class Table_Products_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
         ['name' => 'GRASSROOTS LP Ebony', 'description' => 'abc',
          'hot' => '1', 'new' => '0', 'deals' => '0', 'quantity' => '5',
          'unit_price' => '14000000', 'promotion_price' => '12000000',
          'image' => '0-3.jpg', 'unit' => 'cây', 'category_id' => '1', 'brand_id'=>'1',
          'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
         ['name' => 'GRASSROOTS LP Honey Sunburst', 'description' => 'abc',
          'hot' => '1', 'new' => '0', 'deals' => '0', 'quantity' => '3',
          'unit_price' => '8000000', 'promotion_price' => '7500000',
          'image' => '0-2.jpg', 'unit' => 'cây', 'category_id' => '1', 'brand_id'=>'1',
          'created_at' => '2017-09-28 04:04:19', 'updated_at' => '2017-09-28 08:11:23'],
         ['name' => 'EPIPHONE LP VE WN', 'description' => 'abc',
          'hot' => '1', 'new' => '0', 'deals' => '0', 'quantity' => '3',
          'unit_price' => '5500000', 'promotion_price' => '4900000',
          'image' => '0-walnut.jpg', 'unit' => 'cây', 'category_id' => '1', 'brand_id'=>'1',
          'created_at' => '2017-09-28 04:04:59', 'updated_at' => '2017-09-28 08:11:39'],
         ['name' => 'EPIPHONE LP VE BLK', 'description' => 'abc',
          'hot' => '1', 'new' => '0', 'deals' => '0', 'quantity' => '3',
          'unit_price' => '5000000', 'promotion_price' => '4500000',
          'image' => '0-black.jpg', 'unit' => 'cây', 'category_id' => '1', 'brand_id'=>'2',
          'created_at' => '2017-09-28 04:14:29', 'updated_at' => '2017-09-18 08:11:33'],
         ['name' => 'CORT AC100-OP', 'description' => 'abc',
          'hot' => '1', 'new' => '1', 'deals' => '0', 'quantity' => '5',
          'unit_price' => '3500000', 'promotion_price' => '2700000',
          'image' => '0-2a.jpg', 'unit' => 'cây', 'category_id' => '2', 'brand_id'=>'2',
          'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
         ['name' => 'CORT AF510-OP', 'description' => 'abc',
          'hot' => '1', 'new' => '1', 'deals' => '0', 'quantity' => '5',
          'unit_price' => '2800000', 'promotion_price' => '2500000',
          'image' => '2a.jpg', 'unit' => 'cây', 'category_id' => '2', 'brand_id'=>'3',
          'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
         ['name' => 'CORT AF510E-OP', 'description' => 'abc',
          'hot' => '0', 'new' => '1', 'deals' => '0', 'quantity' => '5',
          'unit_price' => '3300000', 'promotion_price' => '3000000',
          'image' => '2.jpg', 'unit' => 'cây', 'category_id' => '2', 'brand_id'=>'3',
          'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
          ['name' => 'CORT AD810', 'description' => 'abc',
           'hot' => '0', 'new' => '1', 'deals' => '0', 'quantity' => '5',
           'unit_price' => '2800000', 'promotion_price' => '2500000',
           'image' => '0.png', 'unit' => 'cây', 'category_id' => '2', 'brand_id'=>'4',
           'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
          ['name' => 'LINE 6 Spider Classic 15', 'description' => 'abc',
           'hot' => '0', 'new' => '0', 'deals' => '1', 'quantity' => '5',
           'unit_price' => '3300000', 'promotion_price' => '3000000',
           'image' => 'amp1.jpg', 'unit' => 'amp', 'category_id' => '4', 'brand_id'=>'4',
           'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
          ['name' => 'CORT MX15', 'description' => 'abc',
           'hot' => '0', 'new' => '0', 'deals' => '1', 'quantity' => '5',
           'unit_price' => '2800000', 'promotion_price' => '2500000',
           'image' => 'amp2.jpg', 'unit' => 'amp', 'category_id' => '4', 'brand_id'=>'1',
           'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
          ['name' => 'CORT MX15R', 'description' => 'abc',
           'hot' => '0', 'new' => '0', 'deals' => '1', 'quantity' => '5',
           'unit_price' => '2800000', 'promotion_price' => '2500000',
           'image' => 'amp3.jpg', 'unit' => 'amp', 'category_id' => '4', 'brand_id'=>'1',
           'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
          ['name' => 'FENDER FRONTMAN 15G', 'description' => 'abc',
           'hot' => '0', 'new' => '0', 'deals' => '1', 'quantity' => '5',
           'unit_price' => '1800000', 'promotion_price' => '1500000',
           'image' => 'amp4.jpg', 'unit' => 'amp', 'category_id' => '4', 'brand_id'=>'4',
           'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],

      ]);

    }
}
