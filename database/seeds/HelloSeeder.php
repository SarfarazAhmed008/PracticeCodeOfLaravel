<?php

use Illuminate\Database\Seeder;

use App\Hello;
use App\Category;

class HelloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $category1 = new Category();
        $category1->name = 'Category type 1';
        $category1->save(); 

        $category2 = new Category();
        $category2->name = 'Category type 2';
        $category2->save(); 

        $info = new Hello();
        $info->type = 'Smile';
        $info->niceness = 5;
        $info->save();

        $category1->hello()->attach($info);
        $category2->hello()->attach($info);

        $info = new Hello();
        $info->type = 'Cry';
        $info->niceness = 2;
        $info->save();

        $category1->hello()->attach($info);
   

        $info = new Hello();
        $info->type = 'Wink';
        $info->niceness = 10;
        $info->save();

        $category1->hello()->attach($info);
        $category2->hello()->attach($info);

        $info = new Hello();
        $info->type = 'Blink';
        $info->niceness = 15;
        $info->save();

        $info = new Hello();
        $info->type = 'Stare';
        $info->niceness = 15;
        $info->save();

        $category2->hello()->attach($info);

        $info = new Hello();
        $info->type = 'Slap';
        $info->niceness = 15;
        $info->save();


    }
}
