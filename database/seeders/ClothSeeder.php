<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
			[
	            'name' => 'cap',
	            'image' => 'uploads/1670489018-930787-cap.jpg',
        	],
			[
	            'name' => 'shirt',
	            'image' => 'uploads/1670489018-482104-shirt.jpg',
        	],
			[
	            'name' => 'jeans',
	            'image' => 'uploads/1670489018-498498-jeans.jpg',
        	],
			[
	            'name' => 'sun glasses',
	            'image' => 'uploads/1670489018-805189-glass.jpg',
        	],
    	];
        DB::table('clothes')->insert($data);
    }
}
