<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => fake()->name(),
            'gender'      => "LAKI-LAKI",
            'birth_date'  => Carbon::create(1999, 06, 10),
            'occupation'  => 'Programmer',
            'province'    => ["id"  =>  "11", "nama" =>  "ACEH"], //{"id":"11","nama":"ACEH"}
            'city'        => ["id"  =>  "1112", "nama" =>  "KAB. ACEH BARAT DAYA"], //{"id":"1112","nama":"KAB. ACEH BARAT DAYA"}
            'subdistrict' => ["id"  =>  "111203", "nama" =>  "Manggeng"], //{"id":"111203","nama":"Manggeng"}
            'village'     => ["id"  =>  "1112032026", "nama" =>  "Sejahtera"] //{"id":"1112032026","nama":"Sejahtera"}
        ];
    }
}
