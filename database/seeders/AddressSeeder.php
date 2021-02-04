<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ai_address')->insert([
            [
                'name'          => 'Juan Perez',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Lucas Ramirez',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Oscar de la Olla',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Juan Lagarez',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Miguel Paniagua',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Jose Tomas',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Jesus Mg',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Guillermo Leon',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Pecho de lata',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
            [
                'name'          => 'Ander Miguel',
                'description'   => 'descripción de juan perez',
                'phone'         => '829-564-5216',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'img'           => null,
            ],
        ]);
    }
}
