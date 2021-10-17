<?php

namespace Database\Factories;

use App\Models\Mobil;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MobilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mobil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_mobil' => Str::upper(Str::random(3)) . $this->faker->year() . $this->faker->unique()->randomNumber(5),
            'merek' => $this->faker->word(),
            'model' => $this->faker->word(),
            'tipe' => $this->faker->randomElement(['SUV', 'Sport', 'Convertible', 'Coupe', 'City', 'Hatchback', 'MPV', 'Station Wagon', 'Mini Bus', 'Truck', 'Sedan']),
            'warna' => $this->faker->colorName(),
            'harga' => $this->faker->numberBetween(75_000_000, 3_000_000_000),
            'tahun' => $this->faker->year(),
            'gambar' => $this->faker->imageUrl(800, 600, 'car')
        ];
    }
}
