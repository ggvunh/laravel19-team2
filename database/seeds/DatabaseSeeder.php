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
        $this->call(TableMenuSeeder::class);
        $this->call(TableCategoriesSeeder::class);
        $this->call(Table_Products_Seeder::class);
    }
}

class TableMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('menu')->insert([
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
        ['id' =>1, 'name' => 'Electric Guitar', 'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
        ['id' =>2, 'name' => 'Acoustic Guitar', 'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
        ['id' =>3, 'name' => 'Bass', 'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
        ['id' =>4, 'name' => 'Amp/effect', 'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
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
      DB::table('Products')->insert([
        ['name' => 'GRASSROOTS LP Ebony', 'description' => 'abc',
         'hot' => '1', 'new' => '0', 'deals' => '0', 'quantity' => '5',
         'unit_price' => '14000000', 'promotion_price' => '12000000',
         'image' => '0-3.jpg', 'unit' => 'cây', 'category_id' => '1',
         'created_at' => '2017-09-28 04:04:29', 'updated_at' => '2017-09-28 08:11:33'],
        ['name' => 'GRASSROOTS LP Honey Sunburst', 'description' => 'abc',
         'hot' => '1', 'new' => '0', 'deals' => '0', 'quantity' => '3',
         'unit_price' => '8000000', 'promotion_price' => '10000000',
         'image' => '0-2.jpg', 'unit' => 'cây', 'category_id' => '1',
         'created_at' => '2017-09-28 04:04:19', 'updated_at' => '2017-09-28 08:11:23'],
        ['name' => 'EPIPHONE LP VE WN', 'description' => 'abc',
         'hot' => '1', 'new' => '0', 'deals' => '0', 'quantity' => '3',
         'unit_price' => '4900000', 'promotion_price' => '5500000',
         'image' => '0-walnut.jpg', 'unit' => 'cây', 'category_id' => '1',
         'created_at' => '2017-09-28 04:04:59', 'updated_at' => '2017-09-28 08:11:39'],
        ['name' => 'EPIPHONE LP VE BLK', 'description' => 'abc',
         'hot' => '1', 'new' => '0', 'deals' => '0', 'quantity' => '3',
         'unit_price' => '4900000', 'promotion_price' => '5500000',
         'image' => '0-black.jpg', 'unit' => 'cây', 'category_id' => '1',
         'created_at' => '2017-09-28 04:14:29', 'updated_at' => '2017-09-18 08:11:33'],
      ]);
    }
}
