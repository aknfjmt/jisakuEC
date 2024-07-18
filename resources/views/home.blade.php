@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                    <div>
    
                    <div class='text-center'><form action="" method="GET">
                        <input type="text" name="keyword" placeholder="キーワード" value="{{ $keyword }}">
                        <form action="" method="post">
                            <select name='amount'>
                                <option value=''></option>
                                <option value='1'>1</option>
                                <option value='1000'>1000</option>
                                <option value='2000'>2000</option>
                                <option value='3000'>3000</option>
                                <option value='4000'>4000</option>
                                <option value='5000'>5000</option>
                                <option value='6000'>6000</option>
                                <option value='7000'>7000</option>
                                <option value='8000'>8000</option>
                                <option value='9000'>9000</option>
                                <option value='10000'>10000</option>
                            </select>円〜
              
                            <select name='amount1'>
                                <option value=''></option>
                                <option value='1000'>1000</option>
                                <option value='2000'>2000</option>
                                <option value='3000'>3000</option>
                                <option value='4000'>4000</option>
                                <option value='5000'>5000</option>
                                <option value='6000'>6000</option>
                                <option value='7000'>7000</option>
                                <option value='8000'>8000</option>
                                <option value='9000'>9000</option>
                                <option value='10000'>10000</option>
                            </select>円
                            <input type="submit" value="検索">
                        </form>
</div>
</div></h5>
    
  </div>
</div><br>

                    @foreach($items as $item)
                   
<div class="row">

  <div class="card" style="width: 50rem;">
    <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{ asset($item['image']) }}" width="250" height="235" class="card-img-top">
    </div>
    <div class="col-md-8">
        <div class="card-body"><div class='text-center'>
            <h3 class="card-title">{{ ($item['name']) }}</h3><br>
            <h5 class="card-text">{{ ($item['amount']) }} 円</h5><br>
            <a href="{{route('sample.show',['sample' => $item['id']])}}" class="btn btn-outline-danger">商品詳細</a>
            @auth
            @if($like_model->like_exist(Auth::user()->id,$item['id']))
<p class="favorite-marke">
  <a class="js-like-toggle loved" href="" data-itemid="{{ $item['id']}}"><i class="fas fa-heart"></i></a>
  <span class="likesCount">{{$item->likes_count}}</span>
</p>
@else
<p class="favorite-marke">
  <a class="js-like-toggle" href="" data-itemid="{{ $item['id'] }}"><i class="fas fa-heart"></i></a>
  <span class="likesCount">{{$item->likes_count}}</span>
</p>

@endif
@endauth
            
        </div></div>
    </div>
  </div>
</div>
</div><br>
                      @endforeach
                       
                      
                    
                        
                       
            
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>

$(function () {
    var like = $('.js-like-toggle');
    var likePostId;
    
    like.on('click', function () {
        console.log('a');
        var $this = $(this);
        likePostId = $this.data('itemid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/like',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'item_id': likePostId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });

    
    });
  </script>


  <style>

.loved i {
  color: red !important;
}

</style>

@endsection


