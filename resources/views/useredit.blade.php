@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class='text-center'>登録内容の編集</div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class = 'panel-body'>
                        @if($errors->any())
                        <div class='alert alert-danger'>
                            <ul>
                                @foreach($errors->all() as $message)
                                <li>{{ $message }}
                                @endforeach
                            <ul>
                        </div>
                        @endif
                    </div>
                    
                    <form action="" method="post" >
                        @csrf
                        <div class='text-center'><label for='name' class='mt-2'>ユーザー名</label></div>
                        <input type='text' class='form-control' name='name' value="{{old('name',$user['name'])}}"/> 
                        <div class='text-center'><label for='email' class='mt-2'>メールアドレス</label></div>
                        <input type='text' class='form-control' name='email' value="{{old('email',$user['email'])}}"/> 
                        <div class='text-center'><label for='fullname'>氏名</label></div>
                        <input type='text' class='form-control' name='fullname' value="{{old('fullname',$user['fullname'])}}"/>
                        <div class='text-center'><label for='tel'>電話番号</label></div>
                        <input type='text' class='form-control' name='tel' value="{{old('tel',$user['tel'])}}"/>
                        <div class='text-center'><label for='postcode'>郵便番号</label></div>
                        <input type='text' class='form-control' name='postcode' value="{{old('postcode',$user['postcode'])}}"/>
                        <div class='text-center'><label for='address'>住所</label></div>
                        <input type='text' class='form-control' name='address' value="{{old('address',$user['address'])}}"/>
                        
                        <div class='row justify-content-center'>
                            <button type='submit' class='btn btn-outline-danger w-25 mt-3'>登録</button>
                        </div> 
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>             
@endsection