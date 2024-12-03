<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class forallseeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('status_orders')->insert([
      'name' => 'pending',
    ]);
    DB::table('status_orders')->insert([
      'name' => 'received',
    ]);
    DB::table('status_orders')->insert([
      'name' => 'delivery',
    ]);
    DB::table('status_orders')->insert([
      'name' => 'cancelled',
    ]);

    DB::table('typegames')->insert([
      'name' => 'Action',
    ]);
    DB::table('filter')->insert([
      'name' => 'Action',
      'data_filter' => 'act',
    ]);
    DB::table('products')->insert([
      'name' => 'asfasfas',
      'description' => 'asfasf2',
      'price' => 30,
      'discount' => 0,
      'price_after_discount' => 30,
      'quantity' => 150,
      'image' => '1.jpg',
      'type' => 1,
      'filter' => 1,
    ]);
    DB::table('products')->insert([
      'name' => 'asfafasfasfsfa2s',
      'description' => 'fasfas',
      'price' => 50,
      'discount' => 0,
      'price_after_discount' => 30,
      'quantity' => 100,
      'image' => '2.jpg',
      'type' => 1,
      'filter' => 1,
    ]);

    DB::table('usertype')->insert([
      'name' => 'user',
    ]);
    DB::table('usertype')->insert([
      'name' => 'admin',
    ]);

    DB::table('users')->insert([
      'name' => 'karam',
      'email' => 'qqqqkaramnaser@gmail.com',
      'username' => 'karamnaser123',
      'phone' => '0566304321',
      'password' => bcrypt('12341234'),
      'usertype' => 2,
    ]);
  }
}
