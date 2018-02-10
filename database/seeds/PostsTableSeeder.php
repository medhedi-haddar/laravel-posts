<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Categorie::create([
            'name' => 'science'
        ]);
        App\Categorie::create([
            'name' => 'hotelerie'
        ]);
        App\Categorie::create([
            'name' => 'informatique'
        ]);
        App\Categorie::create([
            'name' => 'biologie'
        ]);

        App\Categorie::create([
            'name' => 'genie civile'
        ]);
        App\Categorie::create([
            'name' => 'math'
        ]);

        Storage::disk('local')->delete(Storage::allFiles());

        factory(App\Post::class, 30)->create()->each(function($post){

            $link = str_random(12).'jpg';
            $file = file_get_contents('http://lorempicsum.com/futurama/250/250/'.rand(1,9));
            Storage::disk('local')->put($link, $file);

            $post->picture()->create([
                'title' => 'Default',
                'link' => $link
            ]);

            $categorie = App\Categorie::find(rand(1,6));
            $post->categorie()->associate($categorie);
            $post->save();
        });
    }
}
