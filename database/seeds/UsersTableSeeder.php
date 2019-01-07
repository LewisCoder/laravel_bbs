<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
   
    public function run()
    {
    	//获取 Faker 实例
        $faker = app(Faker\Generator::class);
        //头像假数据
        $avatars = [
        	'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png',
        ];
        //生成数据集合
        $users = factory(User::class)->times(10)->make()
        ->each(function ($user,$index) use ($faker,$avatars)
        {
        	$user->avatar = $faker->randomElement($avatars);
        });
        //将数据集合转化为数据方便插入数据库
        $users_array = $users->makeVisible(['password','remember_token'])->toArray();
        //插入数据库
        User::insert($users_array);
        //单独处理第一个用户
        $user = User::first();
        $user->email = '1825217374@qq.com';
        $user->name = 'Lewis';
        $user->avatar = 'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save(); 
    }
}
