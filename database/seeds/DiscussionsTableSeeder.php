<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing OAUTH2 with laravel passport';
        $t2 = 'Pagination in vuejs not working correctly';
        $t3 = 'Vuejs event listeners for child components';
        $t4 = 'Laravel homestead error - undetected database';

        $d1 = [
            'title' => $t1,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolor aperiam veritatis magni quis rem ratione quam suscipit modi, delectus tenetur asperiores minima odio laudantium enim quasi error dolorum voluptatum!',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1)
        ];

        $d2 = [
            'title' => $t2,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolor aperiam veritatis magni quis rem ratione quam suscipit modi, delectus tenetur asperiores minima odio laudantium enim quasi error dolorum voluptatum!',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2)
        ];

        $d3 = [
            'title' => $t3,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolor aperiam veritatis magni quis rem ratione quam suscipit modi, delectus tenetur asperiores minima odio laudantium enim quasi error dolorum voluptatum!',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t3)
        ];

        $d4 = [
            'title' => $t4,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolor aperiam veritatis magni quis rem ratione quam suscipit modi, delectus tenetur asperiores minima odio laudantium enim quasi error dolorum voluptatum!',
            'channel_id' => 5,
            'user_id' => 1,
            'slug' => str_slug($t4)
        ];

        \App\Discussion::create($d1);

        \App\Discussion::create($d2);

        \App\Discussion::create($d3);

        \App\Discussion::create($d4);
    }
}
