<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    //
    public function like(Request $request)
    {
        Nice::create([
            'shop_id' => $request->id,
            'user_id' => Auth::user()->id
        ]);
        
        return redirect()->back();
    }

    public function unlike(Request $request)
    {

        Nice::where('shop_id',$request->id)->where('user_id',Auth::id())->delete();
        
        return redirect()->back();
    }

    public function index()
    {
     
        $shop = Shop::all();
        $nices = Nice::where('shop_id', $shop->id)->get();


        return view('mypage', compact('nices'));
    }

}
