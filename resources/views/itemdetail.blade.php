@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mb-3">
            <img src="{{ asset($item['image']) }}"  class="card-img-top" alt="...">
            <div class="card-body">
                <div class='text-center'><h4 class="card-title">{{ ($item['name']) }}</h4></div><br>
                <div class='text-center'><p class="card-text">{{ ($item['text']) }}</p></div><br>
                <div class='text-center'><h3 class="card-text">{{ ($item['amount']) }}円</h3></p></div><br>
 
                <div class='text-center' >＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿</div>
                <div class='text-center' ><h5>レビュー</h5></div>
                <div class='text-center' >￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣</div>
                
                @foreach($reviews as $review)
                <div class="row justify-content-center">
                    <div class="col-md-7"><br>
                    <div class='text-center'>
                        <div class="card border-light mb-3"  >
                            <div class="card-header">{{ ($review['title']) }}</div>
                            <div class="card-body">
                                <p class="card-text">{{ ($review['text']) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        
            <div class='text-center'><a href="{{route('Add.cart',['id' => $item['id']])}}" class="btn btn-outline-danger">カートに入れる</a></div><br>
            <div class='text-center'><a href="{{route('review.form',['id' => $item['id']])}}" class="btn btn-outline-secondary">レビュー登録</a></div><br>
            

        </div>
    </div>
</div>
@endsection
