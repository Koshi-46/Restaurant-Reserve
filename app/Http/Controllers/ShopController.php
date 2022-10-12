<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Area;
use App\Models\Shop;
// use App\Models\Nice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    //
    public function index()
    {
        $shops = Shop::with('area', 'genre')->get();
        $areas = Area::all();
        $genres = Genre::all();
        // $users = Auth::user();
        return view('/index', ['shops' => $shops, 'areas' => $areas, 'genres' => $genres]);
    }

    public function detail(Request $request)
    {
        // $user = Auth::user();
        $shops = Shop::with('area', 'genre')->find($request->id);
        $areas = Area::all();
        $genres = Genre::all();
        return view('/detail', ['shops' => $shops, 'areas' => $areas, 'genres' => $genres]);
    }

    public function search(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $keyword = $request['name'];
        $area_id = $request['area_id'];
        $genre_id = $request['genre_id'];
        $shops = Shop::doSearch($keyword, $area_id, $genre_id);
        return view('/search', ['shops' => $shops, 'areas' => $areas, 'genres' => $genres]);
    }

    // public function reserve(Request $request)
    // {
    //     //
    //     $areas = Area::all();
    //     $genres = Genre::all();
    //     $keyword = $request['date'];
    //     $area_id = $request['time'];
    //     $genre_id = $request['member'];
    // }
}
