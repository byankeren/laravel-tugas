<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use App\Models\Game;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $tags = ([
            [
                'name' => 'Open World'
            ],
            [
                'name' => 'Strategy'
            ],
            [
                'name' => 'Shooting'
            ],
        ]);

        foreach ($tags as $tag) {
            Tag::create($tag);
        }

        // Game::create([
        //     'name' => 'League Of Legends',
        //     'author_id' => '1',
        // ], [
        //     'name' => "Baldur's Gate 3",
        //     'author_id' => '2'
        // ]);
        // Author::create(
        //     [
        //         'name' => 'Riot',
        //     ],
        //     [
        //         'name' => 'Larian',
        //     ],
        // );
    }
}
