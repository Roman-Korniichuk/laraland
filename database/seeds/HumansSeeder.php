<?php

use Illuminate\Database\Seeder;
use App\Human;

class HumansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Human::create([
            'name'=>'Tom Rensed',
            'position'=>'Chief Executive Officer',
            'image'=>'team_pic1.jpg',
            'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
        ]);
        Human::create([
            'name'=>'Kathren Mory',
            'position'=>'Vice President',
            'image'=>'team_pic2.jpg',
            'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
        ]);
        Human::create([
            'name'=>'Lancer Jack',
            'position'=>'Senior Manager',
            'image'=>'team_pic3.jpg',
            'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
        ]);
    }
}
