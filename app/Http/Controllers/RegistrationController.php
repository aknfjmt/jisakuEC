<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Review;
use App\User;
use App\Order;
use App\Like;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserData;



class RegistrationController extends Controller
{

    public function itemDetail(int $id)
    {
        $item = Item::find($id);
        
        $review = new Review;

        $review1 = $review->where('item_id',$id)->get();

    
        return view('itemdetail',[ 
            'item' => $item,
            'reviews' => $review1,
        ]);
    }
    

    public function itemList(){
        
        $item = new Item;
        
        $all = $item->all()->toArray();

        
        return view('itemlist',[
        'items' => $all,
        ]);
        
    }

    public function reviewRegistrationForm(int $itemId){

        $item = Item::find($itemId);


        return view('review',[
            'id' => $itemId,
            'item' => $item,
        ]);

    }
    
    public function reviewRegistration(Request $request ,int $itemId){

        $review = new Review;

        $item = Item::find($itemId);

        $user = Auth::user();

        $review->title = $request->title;
        $review->text = $request->text;
        $review->item_id = $item->id;
        $review->user_id = $user->id;
        
        $review->save();

        return redirect('/');
       
    }

    

    public function itemHidden(int $itemId){

        $item = Item::find($itemId);

        $item->item_flg = 1;

        $item->save();
        
        return redirect('/list');

        
    }


    public function adminPage(){
        
        $order = new Order;

        $uriage = Order::selectRaw('SUM(amount) as amount')->get();
        
        return view('admin',[
            'uriages' => $uriage,
        ]);
        
    }

    public function userList(){

        $user = new User;
        
        $all = $user->all()->toArray();

        
        return view('userlist',[
        'users' => $all,
        ]);
        
        
        
    }

    public function myPage(){

        $date = Auth::user();


        $post = Like::join('items','likes.item_id','=','items.id')
        ->get();

        
        return view('mypage',[
            'user' => $date,
            'likes' => $post,
        ]);
        
    }

    public function userEditForm(){

        $date = Auth::user();

        
        return view('useredit',[
            'user' => $date,
        ]);
        
    }

    public function userEdit(UserData $request){

        $date = Auth::user();

        $date->name = $request->name;
        $date->email = $request->email;
        $date->fullname = $request->fullname;
        $date->tel = $request->tel;
        $date->postcode = $request->postcode;
        $date->address = $request->address;

        $date->save();

        return redirect('/mypage');

        
        return view('useredit');
        
    }

    public function AddCart(int $itemId){

       $item = new Item;

       if(!$item->where('cart_flg',1)->get()->isEmpty()){

        $date = $item->where('cart_flg',1)->get();
    
        $all = $date->toArray();
        
        return view('cart',[
        'carts' => $all,
        ]);

    }else{

        $cart = Item::find($itemId);
        
        $cart->cart_flg = 1;

        $cart->save();

        return redirect('/');
    }

        
        
    }

    public function cartDelete(int $itemId){

        $cart = Item::find($itemId);

        $cart->cart_flg = 0;

        $cart->save();

        
        return redirect('/');
        
    }

    public function cartComplete(int $itemId){
        
        $cart = Item::find($itemId);
        
        $cart->cart_flg =  0;

        $cart->save();


        $order = new Order;
        $item = new Item;
        $user = Auth::user();

        

        $order->item_id = $cart->id;
        $order->count = '1';
        $order->amount = $cart->amount;
        $order->user_id = $user->id;
        
        $order->save();

        return redirect('/');
        
    }

    public function userOrder(){


        $order = Order::join('items','orders.item_id','=','items.id')
        ->join('users','orders.user_id','=','users.id')
        ->get();
        


        return view('order',[
            'orders' => $order,
        ]);
        
    }

    

    public function cartContents(){

        $item = new Item;
        
        if(!$item->where('cart_flg',1)->get()->isEmpty()){

            $date = $item->where('cart_flg',1)->get();
        
            $all = $date->toArray();
            
            return view('cart',[
            'carts' => $all,
            ]);
    
        }else{
    
            return redirect('/');
        
        };
    }

    public function userDelete(){

        $user = Auth::user();

        $user->delete();

        return redirect('/');
        
    }

    public function passreset(){
        
        return view('passreset');
        
    }

    


}