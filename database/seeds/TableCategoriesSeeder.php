<?php

use Illuminate\Database\Seeder;

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
