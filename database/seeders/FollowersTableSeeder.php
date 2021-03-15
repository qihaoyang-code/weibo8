<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        $followers = $users->slice(1);
        $followers->id = $followers->pluck('id')->toArray();

        //关注一号外所有用户
        $user->follow($followers->id);

        //除一号外所有用户都关注一号
        foreach ($followers as $follower){
            $follower->follow($user_id);
        }
    }
}
