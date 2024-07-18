@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7"><br>
                        <div class="card">
                            <div class="card-header"><div class='text-center' ><font size="4">総売り上げ</font></div></div><br>
                            <div class='text-center' >
                            @foreach ($uriages as $uriage)
                            <h4>{{ $uriage['amount'] }}円</h4>
                            @endforeach
                            </div>
                              
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>
                        <div class="card-body">  
                    
        <div class='text-center' >＿＿＿＿＿＿＿＿＿＿</div>
        <div class='text-center' ><font size="4">メニュー</font></font></div>
        <div class='text-center' >￣￣￣￣￣￣￣￣￣￣</div>
        <div class='text-center'><font size="3">・<a href="{{ route('item.list') }}">商品リスト</a></font></div>
        <div class='text-center'><font size="3">・<a href="{{ route('user.list') }}">ユーザーリスト</a></font></div>    
        </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection