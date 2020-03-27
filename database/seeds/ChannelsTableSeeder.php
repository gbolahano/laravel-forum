<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel', 'slug' => str_slug('laravel') ];
        $channel2 = ['title' => 'Vuejs', 'slug' => str_slug('Vuejs') ];
        $channel3 = ['title' => 'Css3', 'slug' => str_slug('Css3') ];
        $channel4 = ['title' => 'Javascript', 'slug' => str_slug('Javascript') ];
        $channel5 = ['title' => 'PHP Testing', 'slug' => str_slug('PHP Testing') ];
        $channel6 = ['title' => 'Spark', 'slug' => str_slug('Spark') ];
        $channel7 = ['title' => 'Lumen', 'slug' => str_slug('Lumen') ];
        $channel8 = ['title' => 'Forge', 'slug' => str_slug('Forge') ];

        \App\Channel::create($channel1);
        \App\Channel::create($channel2);
        \App\Channel::create($channel3);
        \App\Channel::create($channel4);
        \App\Channel::create($channel5);
        \App\Channel::create($channel6);
        \App\Channel::create($channel7);
        \App\Channel::create($channel8);
    }
}
