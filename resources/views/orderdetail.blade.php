@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class='text-center'>カートの中身</div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        @foreach($carts as $cart)
                        <div class="row justify-content-center">
                            <div class="card mb-6" style="max-width: 600px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($cart['image']) }}"  class="card-img-top" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class='text-center'><h5 class="card-title">{{ ($cart['name']) }}</h5></div>
                                        <div class='text-center'><p class="card-text">{{ ($cart['amount']) }}</p></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div><br>
                        @endforeach
                        
                        <div class='text-center'><a href="{{route('cart.complete',['id' => $cart['id']])}}"  class="btn btn-primary">購入する</a></div><br>
                </div>
            </div>
        </div>
    </div>
</div>             
@endsection