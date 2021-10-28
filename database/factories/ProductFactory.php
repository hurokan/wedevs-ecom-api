<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Forget Ash Full Sleeve T-Shirt for Men",
            'description' => 'This T-shirt for men’s comfortable and may be worn for regular use. it’s far an excellent put on for guys like you. you’ll like to put on this expensive and colorful t- shirt just for its flexible usability and diverse style experience. it is normally made from a light, brilliant quality Taiwan CVC fabrics and is simple to smooth.Full sleeve design with a everyday suit for men. it is very versatile because ',
            'qty' => 10,
            'unit' => "PC",
            'price' => 104,
            'vat_amt' => 10,
            'image' => '',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {

    }
}
