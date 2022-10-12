<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'name' => '寿司'
        ];
        Genre::create($param);
        $param = [
            'name' => '居酒屋'
        ];
        Genre::create($param);
        $param = [
            'name' => '焼肉'
        ];
        Genre::create($param);
        $param = [
            'name' => 'イタリアン'
        ];
        Genre::create($param);
        $param = [
            'name' => 'ラーメン'
        ];
        Genre::create($param);
    }
}
