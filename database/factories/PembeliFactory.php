<?php

namespace Database\Factories;

use App\Models\Pembeli;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembeliFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pembeli::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ktp_pembeli' => $this->faker->unique()->creditCardNumber(),
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_telp' => $this->faker->phoneNumber()
        ];
    }
}
