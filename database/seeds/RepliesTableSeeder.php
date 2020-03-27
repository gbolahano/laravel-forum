<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolor aperiam veritatis magni quis rem ratione quam suscipit modi, delectus tenetur asperiores minima odio laudantium enim quasi error dolorum voluptatum!',
        ];

        $r2 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolor aperiam veritatis magni quis rem ratione quam suscipit modi, delectus tenetur asperiores minima odio laudantium enim quasi error dolorum voluptatum!',
        ];

        $r3 = [
            'user_id' => 2,
            'discussion_id' => 1,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolor aperiam veritatis magni quis rem ratione quam suscipit modi, delectus tenetur asperiores minima odio laudantium enim quasi error dolorum voluptatum!',
        ];

        $r4 = [
            'user_id' => 4,
            'discussion_id' => 4,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta dolor aperiam veritatis magni quis rem ratione quam suscipit modi, delectus tenetur asperiores minima odio laudantium enim quasi error dolorum voluptatum!',
        ];

        \App\Reply::create($r1);
        
        \App\Reply::create($r2);
        
        \App\Reply::create($r3);

        \App\Reply::create($r4);
    }
}
