<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	[
        		'name' => 'Community',
        		'children' => [
        			['name' => 'Activities'],
        			['name' => 'Artists'],
        			['name' => 'Childcare'],
        			['name' => 'Classes'],
        			['name' => 'Events'],
        			['name' => 'General'],
        			['name' => 'Groups'],
        			['name' => 'Local news'],
        			['name' => 'Lost and found'],
        			['name' => 'Musicians'],
        			['name' => 'Pets'],
        			['name' => 'Politics'],
        			['name' => 'Rideshare'],
        			['name' => 'Volunteers'],
        		],
        	],
        	[
        		'name' => 'Personals',
        		'children' => [
        			['name' => 'Slectricly Platonic'],
        			['name' => 'Men seeking womwn'],
        			['name' => 'Women seeking men'],
        			['name' => 'Misc romance'],
        			['name' => 'Casual encounters'],
        			['name' => 'Missed connections'],
        			['name' => 'Escort'],
        			['name' => 'Rants and raves'],
        			['name' => 'One nigth stand'],
        			['name' => 'Date out'],
        			['name' => 'Sex'],
        			['name' => 'Movie nigth'],
        			['name' => 'Slumber party'],
        		],
        	],
        	[
        		'name' => 'Housing',
        		'children' => [
        			['name' => 'Appartment / Housing'],
        			['name' => 'Housing swap'],
        			['name' => 'Housing wanted'],
        			['name' => 'Office / commercial'],
        			['name' => 'Parking /storage'],
        			['name' => 'Real estate for sale'],
        			['name' => 'Rooms / shared'],
        			['name' => 'Rooms wanted'],
        			['name' => 'Sublets / temporary'],
        			['name' => 'Vacation rentals'],
        		],
        	],
        ];

        foreach ($categories as $category) {
        	Category::create($category);
        }
    }
}
