<?php

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
        	[
        	'name' => 'US',
        		'children' => [
        			[
        				'name' => 'Alabama',
        				'children' => [
        					['name' => 'Auburn'],
        					['name' => 'Birmingham'],
        					['name' => 'Dothan'],
        					['name' => 'Florence / Muscle shoals'],
        					['name' => 'Huntsville / Decatur'],
        					['name' => 'Mobile'],
        					['name' => 'Montgomery'],
        					['name' => 'Tuscaloosa'],
        				],
        			],
        			[
        				'name' => 'Alaska',
        				'children' => [
        					['name' => 'Anchorage / Mat-su'],
        					['name' => 'Fairbanks'],
        					['name' => 'Kenai Penisula'],
        					['name' => 'South Alaska'],
        				],
        			],
        			[
        				'name' => 'Arizona',
        				'children' => [
        					['name' => 'Flagstaff / Sedona'],
        					['name' => 'Mohave County'],
        					['name' => 'Phoenix'],
        					['name' => 'Prescott'],
        					['name' => 'Show Low'],
        					['name' => 'Sierra Vista'],
        					['name' => 'Tucson'],
        					['name' => 'Yuma'],
        				],
        			],
        			[
        				'name' => 'Arkansas',
        				'children' => [
        					['name' => 'Flagstaff / Sedona'],
        					['name' => 'Mohave County'],
        					['name' => 'Phoenix'],
        					['name' => 'Prescott'],
        					['name' => 'Show Low'],
        					['name' => 'Sierra Vista'],
        					['name' => 'Tucson'],
        					['name' => 'Yuma'],
        				],
        			],
        			[
        				'name' => 'Carlifornia',
        				'children' => [
        					['name' => 'backersfield'],
        					['name' => 'Chico'],
        					['name' => 'Frenso / Madera'],
        					['name' => 'Gold Contry'],
        					['name' => 'Hanford-Corcran'],
        					['name' => 'Humboldt County'],
        					['name' => 'Inland Empire'],
        					['name' => 'Modesto'],
        					['name' => 'Monterey Bay'],
        					['name' => 'Orange County'],
        					['name' => 'Palm Springs'],
        					['name' => 'Redding'],
        					['name' => 'Sacremento'],
        					['name' => 'San Diego'],
        					['name' => 'San Fracisco Bay'],
        					['name' => 'Santa Barbara'],
        					['name' => 'Santa Maria'],
        					['name' => 'Susanville'],
        					['name' => 'Stockton'],
        					['name' => 'Ventura County'],
        				],
        			],
        		],	
        	],
        ];

        foreach ($areas as $area) {
        	Area::create($area);
        }
    }
}
