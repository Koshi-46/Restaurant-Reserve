<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        {
            $param = [
                'name' => '東京都'
            ];
            Area::create($param);
            $param = [
                'name' => '大阪府'
            ];
            Area::create($param);
            $param = [
                'name' => '福岡県'
            ];
            Area::create($param);
        }
    }
}
