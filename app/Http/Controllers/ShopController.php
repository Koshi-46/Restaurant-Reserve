<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Nice;
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

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $shop_id = $request->shop_id;
        $like = new Nice;
        $shop = Shop::findOrFail($shop_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $shop_id)) {
            //likesテーブルのレコードを削除
            $like = Nice::where('post_id', $shop_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Nice;
            $like->shop_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $shop->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
}



