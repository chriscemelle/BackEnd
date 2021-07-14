<?php

namespace Database\Factories;

use App\Models\Games;
use Illuminate\Database\Eloquent\Factories\Factory;

class GamesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Games::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'game_name' => $this->faker->randomElement([
                'Words with Friends 2',
                'Best Fiends Stars',
                'Fortnite',
                'Jackbox Games',
                ' Minecraft',
                'NBA 2k20',
                'Decurse',
                'Sea of Thieves',
                'Pokemon Go',
                'Mario Kart Tour',
                'Exploding Kittens',
                'Fairway Solitaire',
                'Final Fantasy XIV: A Realm Reborn',
                'DRL Simulator',
                'Uno and Cards Against Humanity',
                'Stardew Valley',
                'Call of Duty Warzone',
                'Gummy Drop',
                'Monopoly',
                'Rocket League',
                'Halo',
                'Grand Theft Auto V Online',
                'Cards Against Humanity/Remote Insensitivity',
                'Houseparty',
                'Crucible',
                'Skribbl',
            ]),
            'description' => $this->faker->word(),
            'player_name' => $this->faker->name(),
            'player_id' => $this->faker->randomElement([1,5]),
            'played_on' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Online', 'Offline']),
        ];
    }
}
