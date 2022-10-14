<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;


class ReserveController extends Controller
{
    //

    public function store(ReserveRequest $request)
    {
        //
        $user = Auth::user();
        // $shop = Shop::with('shop')->where('id', '=', '$request->id')->first();
        Reserve::create([
            'date' => $request['date'],
            'time' => $request['time'],
            'member' => $request['member'],
            'user_id' => $user['id'],
            'shop_id' => $request['shop_id'],
        ]);

        return view('done');
    }

    public function index()
    {
        $user = Auth::user()->name;
        $id = Auth::id();
        $reserves = Reserve::where('user_id', $id)->get();

        return view('mypage', compact('user', 'reserves'));
    }
    
    public function detail(Request $request)
    {
        // $user = Auth::user()->name;
        // $id = Auth::id();
        // $reserves = Reserve::where('user_id', $id)->get();


        $reserves = Reserve::find($request->id);
        return view('change', compact('reserves'));

    }

    public function update(Request $request)
    {
        // $user = Auth::user();
        // $reserve = Reserve::find($request->id);
        // if($reserve->user_id->id !== $user->id) return back();
        // $form = $this->unsetToken($request);
        // unset($reserve['_token']);
        // $reserve->fill($form)->save();
        // $reserve->save();

        $reserve = $request->all();
        unset($reserve['_token']);
        Reserve::where('id',$request->id)->update($reserve);
        return redirect('mypage');
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $reserve = Reserve::find($request->id);
        if ($reserve->user_id !== $user->id) return back();
        $reserve->delete();
        return redirect('mypage');
    }

}
