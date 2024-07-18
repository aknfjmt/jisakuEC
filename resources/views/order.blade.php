@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    
                    <div class='text-center' >＿＿＿＿＿＿＿＿＿＿＿＿</div>
                    <div class='text-center' ><font size="4">ご注文履歴</font></div>
                    <div class='text-center' >￣￣￣￣￣￣￣￣￣￣￣￣</div><br>

                    
                    

                @foreach($orders as $order)
                        <div class="row justify-content-center">
                            <div class="card mb-9" style="width: 500px; ">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($order['image']) }}"   class="card-img-top" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class='text-center'><h5 class="card-title">ご注文日：{{($order['updated_at'])}}</h5></div>
                                        <div class='text-center'><p class="card-text">商品名：{{$order->items->name }}</p></div>
                                        <div class='text-center'><p class="card-text">個数：{{$order['count'] }}</p></div>
                                        <div class='text-center'><p class="card-text">金額：{{($order['amount'])}}円</p></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div><br>
                        @endforeach

                
                <div class='text-center'><a href="{{route('my.page')}}" class="btn btn-primary ">マイページに戻る</a></div></br>
            </div><br>
        </div>
    </div>
</div>       

@endsection