<?php

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

        $myCategories=array("fun","news","tech");
        for ($item=0; $item < count($myCategories); $item++)
        {
          foreach ($myCategories as $index)
            $category = new App\category;
            $category->category =$myCategories[$item];
            $category->save();
        }
      }
    }
