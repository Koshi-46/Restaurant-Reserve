<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Reserve;
use App\Models\Area;
use App\Models\Shop;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    //

    public function store(Request $request)
    {
        //
        $user = Auth::user();
        // $shop = Shop::where('id', '=', '$request->id');
        $shop = Shop::with('shop')->where('id', '=', '$request->id')->first();
        Reserve::create([
            'date' => $request['date'],
            'time' => $request['time'],
            'member' => $request['member'],
            // 'user_id' => Auth::id(),
            'user_id' => $user['id'],
            'shop_id' => $request['id'],
        ]);

        return redirect('/done');
    }
}
