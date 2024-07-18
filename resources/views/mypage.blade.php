@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class='text-center' >＿＿＿＿＿＿＿＿＿＿＿＿</div>
                <div class='text-center' ><font size="4">マイページ</font></font></div>
                <div class='text-center' >￣￣￣￣￣￣￣￣￣￣￣￣</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                    <div class='text-center' ><ul class="list-group list-group-flush">
                        <li class="list-group-item">ユーザー名 ： {{($user['name'])}}</li>
                        <li class="list-group-item">メールアドレス ：{{($user['email'])}} </li>
                        <li class="list-group-item">氏名 ： {{($user['fullname'])}}</li>
                        <li class="list-group-item">電話番号 ： {{($user['tel'])}}</li>
                        <li class="list-group-item">郵便番号 ： {{($user['postcode'])}}</li>
                        <li class="list-group-item">住所 ： {{($user['address'])}}</li>
                    </ul></div>
                </div><br>
                <table border="1" align="center" width="400">
                   
                    
                <div class='text-center' >＿＿＿＿＿＿＿＿＿＿＿＿</div>
                <div class='text-center' ><font size="4">いいね一覧</font></font></div>
                <div class='text-center' >￣￣￣￣￣￣￣￣￣￣￣￣</div>
                                        
                                   
                              
                @foreach($likes as $like)          
                        <tr>
                        
                        <th scope='col'>{{$like->items->name}}</th>
                                    </tr>
                                    @endforeach         
                                    
</table><br>
                <div class='text-center' ><a href="{{route('user.order')}}"><button type="button" class="btn btn-outline-danger">購入履歴</button></a></div><br>
                <div class='text-center' >
                    <a href="{{route('user.edit')}}"><button type="button" class="btn btn-primary btn-lg">変更する</button></a>
                    <a href="{{route('user.delete')}}"><button type="button" class="btn btn-secondary btn-lg">退会する</button></a>
                </div><br>  
            </div>
        </div>
    </div>
</div>         
@endsection