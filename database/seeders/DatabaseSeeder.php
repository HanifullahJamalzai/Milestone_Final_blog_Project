<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(9)->create();
        Category::factory(3)->create();
        
        Comment::factory(200)->create();
        Message::factory(10)->create();
        Post::factory(50)->create();
        Reply::factory(100)->create();
        Tag::factory(30)->create();
        Team::factory(6)->create();


        \App\Models\User::create([
            'name' => 'Hanifullah',
            'email' => 'hanifullah@gmail.com',
            'phone' => '+93779636360',
            'photo' => 'https://avatars.githubusercontent.com/u/43265047?v=4',
            'password' => bcrypt('password'),
            'role' => 1,
        ]);

        About::create([
            'history_title' => 'Company History',
            'history_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!

            Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.',
            'history_photo' => 'https://avatars.githubusercontent.com/u/43265047?v=4',
            'mv_title' => 'Mission & Vision',
            'mv_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!

            Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.',
            'mv_photo' => 'https://avatars.githubusercontent.com/u/43265047?v=4',
        ]);

        Setting::create([
            'fb_url' => fake()->url(),
            'twitter_url' => fake()->url(),
            'instagram_url' => fake()->url(),
            'footer_description' => fake()->paragraph(3),
            'address' => fake()->address(),
            'phone' => 1234567890,
            'email' => fake()->companyEmail(),
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Hanifullah',
        //     'email' => 'hanifullah@gmail.com',
        //     'phone' => '+93779636360',
        //     'photo' => 'https://avatars.githubusercontent.com/u/43265047?v=4',
        //     'password' => bcrypt('password'),
        //     'role' => 1,
        // ]);


    }
}
