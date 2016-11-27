<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('regions')->insert([
    		'RegID' => 1,
    		'RegName' => 'I'
    		]);
    	DB::table('regions')->insert([
    		'RegID' => 2,
    		'RegName' => 'II'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 3,
    		'RegName' => 'III'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 4,
    		'RegName' => 'IV-CALABARZON'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 5,
    		'RegName' => 'IV-MIMAROPA'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 6,
    		'RegName' => 'V'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 7,
    		'RegName' => 'VI'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 8,
    		'RegName' => 'VII'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 9,
    		'RegName' => 'VIII'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 10,
    		'RegName' => 'IX'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 11,
    		'RegName' => 'X'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 12,
    		'RegName' => 'XI'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 13,
    		'RegName' => 'XII'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 14,
    		'RegName' => 'Caraga'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 15,
    		'RegName' => 'ARMM'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 16,
    		'RegName' => 'CAR'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 17,
    		'RegName' => 'NCR'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 18,
    		'RegName' => 'NIR'
    		]);        
    	DB::table('regions')->insert([
    		'RegID' => 98,
    		'RegName' => 'Central Office'
    		]);   
        DB::table('regions')->insert([
            'RegID' => 99,
            'RegName' => 'Save the Children'
            ]);   
        DB::table('regions')->insert([
            'RegID' => 0,
            'RegName' => '[Unspecified]'
            ]);   
    }
}
