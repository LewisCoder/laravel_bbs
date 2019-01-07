<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    
    public function up()
    {
        $categories = [
            [
                'name' => '分享',
                'description' => '分享创作，分享发现',
            ],
            
            [
                'name' => '教程',
                'description' => '开发技巧，Lewis教程',
            ],

            [
                'name' => '问答',
                'description' => '请保持友善',
            ],

            [
                'name' => '公告',
                'description' => '站长发的公告，及时查看',
            ],

        ];
        DB::table('categories')->insert($categories);
    }

   
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
