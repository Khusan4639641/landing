<?php

use Illuminate\Database\Seeder;
use App\Posts;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class postsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posts::insert([
                            [
                                'header'              =>  "some of text",
                                'content'             =>  "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis harum hic illum ipsam iste itaque, natus nihil numquam optio placeat quas quidem quod sint tenetur voluptatibus? Assumenda id quo quos!",
                            ],
                            [
                                'header'              =>  "some of text 1",
                                'content'             =>  "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis harum hic illum ipsam iste itaque, natus nihil numquam optio placeat quas quidem quod sint tenetur voluptatibus? Assumenda id quo quos!",
                            ],
                            [
                                'header'              =>  "some of text 2",
                                'content'             =>  "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis harum hic illum ipsam iste itaque, natus nihil numquam optio placeat quas quidem quod sint tenetur voluptatibus? Assumenda id quo quos!",
                            ]
                ]);
            }
    }
