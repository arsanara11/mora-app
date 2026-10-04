<?php

namespace Database\Seeders;

use App\Models\Atmosphere;
use App\Models\Media;
use App\Models\Mood;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MoraSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Demo User
        |--------------------------------------------------------------------------
        */

        $user = User::updateOrCreate(
            [
                'email' => 'hello@mora.test',
            ],
            [
                'name' => 'Mora',
                'password' => Hash::make('password'),
            ]
        );

        Profile::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'display_name' => 'Mora',
                'username' => 'mora',
                'bio' => 'A place for every feeling.',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Moods
        |--------------------------------------------------------------------------
        */

        $moods = [];

        $moodData = [
            [
                'name' => 'Dreamy',
                'slug' => 'dreamy',
                'description' => 'Soft, distant, and almost unreal.',
                'icon' => '✦',
            ],
            [
                'name' => 'Melancholic',
                'slug' => 'melancholic',
                'description' => 'For quiet thoughts and feelings that stay.',
                'icon' => '☾',
            ],
            [
                'name' => 'Cozy',
                'slug' => 'cozy',
                'description' => 'Warm places, soft lights, and slow moments.',
                'icon' => '⌂',
            ],
            [
                'name' => 'Dark',
                'slug' => 'dark',
                'description' => 'Mysterious, atmospheric, and a little haunting.',
                'icon' => '◐',
            ],
            [
                'name' => 'Romantic',
                'slug' => 'romantic',
                'description' => 'For feelings that are difficult to put into words.',
                'icon' => '♡',
            ],
            [
                'name' => 'Peaceful',
                'slug' => 'peaceful',
                'description' => 'Slow down. Breathe. Stay here for a while.',
                'icon' => '○',
            ],
        ];

        foreach ($moodData as $data) {
            $moods[$data['slug']] = Mood::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Tags
        |--------------------------------------------------------------------------
        */

        $tags = [];

        $tagData = [
            'rain',
            'night',
            'dreamy',
            'lonely',
            'cozy',
            'nostalgic',
            'romantic',
            'dark',
        ];

        foreach ($tagData as $tag) {
            $tags[$tag] = Tag::updateOrCreate(
                ['slug' => Str::slug($tag)],
                [
                    'name' => $tag,
                ]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Atmospheres
        |--------------------------------------------------------------------------
        */

        $atmospheres = [
            [
                'title' => 'Midnight Rain',
                'slug' => 'midnight-rain',
                'description' => 'A quiet room, rain against the window, and a city that refuses to sleep.',
                'mood' => 'melancholic',
                'cover_image' => null,
                'tags' => ['rain', 'night', 'lonely'],
                'media' => [
                    [
                        'type' => 'text',
                        'title' => 'At 2:17 AM',
                        'content' => 'Some nights are not meant to be solved. They are meant to be lived through.',
                        'sort_order' => 1,
                    ],
                    [
                        'type' => 'audio',
                        'title' => 'Midnight Rain',
                        'content' => 'Ambient rain and distant city sounds.',
                        'sort_order' => 2,
                    ],
                ],
            ],

            [
                'title' => 'Blue Hour',
                'slug' => 'blue-hour',
                'description' => 'That strange little moment between daylight and night.',
                'mood' => 'dreamy',
                'cover_image' => null,
                'tags' => ['dreamy', 'night', 'nostalgic'],
                'media' => [
                    [
                        'type' => 'text',
                        'title' => 'Blue Hour',
                        'content' => 'Everything feels softer when the sky cannot decide whether to stay or disappear.',
                        'sort_order' => 1,
                    ],
                ],
            ],

            [
                'title' => 'Warm Sunday',
                'slug' => 'warm-sunday',
                'description' => 'Coffee, sunlight, clean sheets, and absolutely nowhere to be.',
                'mood' => 'cozy',
                'cover_image' => null,
                'tags' => ['cozy', 'nostalgic'],
                'media' => [
                    [
                        'type' => 'text',
                        'title' => 'Slow Morning',
                        'content' => 'Today does not need to be productive. Today can simply be warm.',
                        'sort_order' => 1,
                    ],
                ],
            ],

            [
                'title' => 'Things I Never Said',
                'slug' => 'things-i-never-said',
                'description' => 'A collection of words that remained somewhere between thought and silence.',
                'mood' => 'romantic',
                'cover_image' => null,
                'tags' => ['romantic', 'lonely', 'nostalgic'],
                'media' => [
                    [
                        'type' => 'text',
                        'title' => 'Unsent',
                        'content' => 'There are things I could have said. Maybe that is why they still follow me.',
                        'sort_order' => 1,
                    ],
                ],
            ],

            [
                'title' => 'Old Library',
                'slug' => 'old-library',
                'description' => 'Dusty books, wooden floors, dim lamps, and a world outside that feels very far away.',
                'mood' => 'dark',
                'cover_image' => null,
                'tags' => ['dark', 'nostalgic', 'cozy'],
                'media' => [
                    [
                        'type' => 'text',
                        'title' => 'The Last Lamp',
                        'content' => 'The library stayed awake long after everyone else had gone home.',
                        'sort_order' => 1,
                    ],
                ],
            ],

            [
                'title' => 'Quiet Morning',
                'slug' => 'quiet-morning',
                'description' => 'A window, soft sunlight, and a few minutes where nothing asks anything from you.',
                'mood' => 'peaceful',
                'cover_image' => null,
                'tags' => ['cozy', 'dreamy'],
                'media' => [
                    [
                        'type' => 'text',
                        'title' => 'Breathe',
                        'content' => 'For a moment, there is nowhere else you need to be.',
                        'sort_order' => 1,
                    ],
                ],
            ],
        ];

        foreach ($atmospheres as $data) {
            $atmosphere = Atmosphere::updateOrCreate(
                [
                    'slug' => $data['slug'],
                ],
                [
                    'user_id' => $user->id,
                    'mood_id' => $moods[$data['mood']]->id,
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'cover_image' => $data['cover_image'],
                    'is_public' => true,
                ]
            );

            /*
            |--------------------------------------------------------------------------
            | Atmosphere Tags
            |--------------------------------------------------------------------------
            */

            $tagIds = [];

            foreach ($data['tags'] as $tagName) {
                $tagIds[] = $tags[$tagName]->id;
            }

            $atmosphere->tags()->sync($tagIds);

            /*
            |--------------------------------------------------------------------------
            | Atmosphere Media
            |--------------------------------------------------------------------------
            */

            foreach ($data['media'] as $mediaData) {
                Media::updateOrCreate(
                    [
                        'atmosphere_id' => $atmosphere->id,
                        'title' => $mediaData['title'],
                    ],
                    [
                        'type' => $mediaData['type'],
                        'content' => $mediaData['content'] ?? null,
                        'sort_order' => $mediaData['sort_order'],
                    ]
                );
            }
        }

        $this->command->info('MORA demo data seeded successfully.');
    }
}