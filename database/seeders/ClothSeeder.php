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
	            'image' => 'uploads/'.time().'-'.random_int(100000, 999999).'-cap.jpg',
        	],
			[
	            'name' => 'shirt',
	            'image' => 'uploads/'.time().'-'.random_int(100000, 999999).'-shirt.jpg',
        	],
			[
	            'name' => 'jeans',
	            'image' => 'uploads/'.time().'-'.random_int(100000, 999999).'-jeans.jpg',
        	],
			[
	            'name' => 'sun glasses',
	            'image' => 'uploads/'.time().'-'.random_int(100000, 999999).'-glass.jpg',
        	],
    	];
        DB::table('clothes')->insert($data);
    }
}
