<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\User;
use App\Review;
use App\Like;
use App\Http\Requests\CreateDate;
use App\Http\Requests\ItemEdit;

use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $item = new Item;
        $user = new User;

        
        $date = $item->where('item_flg',0)->where('cart_flg',0)->get();
    
        $all = $date->toArray();
           
        return view('home',[
        'items' => $all,
        'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itemregistration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDate $request)
    {
        $item = new Item;

        $user = Auth::user();

        $dir = 'img';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);


        $item->image = 'storage/' . $dir . '/' . $file_name;
        $item->name = $request->name;
        $item->text = $request->text;
        $item->amount = $request->amount;
        $item->user_id = $user->id;
        
        $item->save();

        return  redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        
        $review = new Review;

        $review1 = $review->where('item_id',$id)->get();

    
        return view('itemdetail',[ 
            'item' => $item,
            'reviews' => $review1,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);


        return view('itemeditform',[
            'id' => $id,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemEdit $request, $id)
    {
        $item = Item::find($id);

        $dir = 'img';

        
            // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $item->image = 'storage/' . $dir . '/' . $file_name;
        


        
        $item->name = $request->name;
        $item->text = $request->text;
        $item->amount = $request->amount;

        $item->save();

        return redirect('/list');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $item->delete();

        return redirect('/list');
    }
}
