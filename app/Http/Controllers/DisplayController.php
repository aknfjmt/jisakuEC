<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Like;

use Illuminate\Support\Facades\Auth;


class DisplayController extends Controller
{

    public function index(Request $request){
        
        $data = new Item;
        $like_model = new Like;
        
            


        $keyword = $request->input('keyword');
        $amount = $request->input('amount');
        $amount1 = $request->input('amount1');



        if(!empty($keyword) && !empty($amount) && !empty($amount1)){

            $post = $data->withCount('likes')->orderBy('created_at', 'desc')->whereBetween('amount',[$amount,$amount1])->where('name', 'LIKE', "%{$keyword}%")->orWhere('text', 'LIKE', "%{$keyword}%")->where('cart_flg',0)->get();       

            
        }else if(!empty($keyword) ) {
           
            $post = $data->withCount('likes')->orderBy('created_at', 'desc')->where('name', 'LIKE', "%{$keyword}%")->orWhere('text', 'LIKE', "%{$keyword}%")->where('cart_flg',0)->get();
        
        }else if(!empty($amount) && !empty($amount1)){
 
            $post = $data->withCount('likes')->orderBy('created_at', 'desc')->whereBetween('amount',[$amount,$amount1])->where('cart_flg',0)->get();       

        }else {
            $post = $data->withCount('likes')->orderBy('created_at', 'desc')->where('cart_flg',0)->get();
        }
        


        return view('home',[
        'items' => $post,
        'keyword' => $keyword,
        'amount' => $amount,
        'like_model'=>$like_model,
        ]);
    }

    public function itemLike(Request $request)
    {
        $id = Auth::user()->id;
        $item_id = $request->item_id;
        $like = new Like;
        $post = Item::findOrFail($item_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $item_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('item_id', $item_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->item_id = $request->item_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }

    
}