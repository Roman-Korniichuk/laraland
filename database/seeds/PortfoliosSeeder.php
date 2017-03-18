<?php

use Illuminate\Database\Seeder;
use App\Portfolio;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::create([
            'name'=>'Finance App',
            'image'=>'portfolio_pic2.jpg',
            'filter'=>'GPS'
        ]);
        Portfolio::create([
            'name'=>'Concept',
            'image'=>'portfolio_pic3.jpg',
            'filter'=>'design'
        ]);
        Portfolio::create([
            'name'=>'Shopping',
            'image'=>'portfolio_pic4.jpg',
            'filter'=>'android'
        ]);
        Portfolio::create([
            'name'=>'Management',
            'image'=>'portfolio_pic5.jpg',
            'filter'=>'design'
        ]);
        Portfolio::create([
            'name'=>'iPhone',
            'image'=>'portfolio_pic6.jpg',
            'filter'=>'web'
        ]);
        Portfolio::create([
            'name'=>'Nexus',
            'image'=>'portfolio_pic7.jpg',
            'filter'=>'web'
        ]);
        Portfolio::create([
            'name'=>'Android',
            'image'=>'portfolio_pic8.jpg',
            'filter'=>'android'
        ]);
    }
}
