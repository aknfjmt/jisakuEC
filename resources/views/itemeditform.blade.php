@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class='text-center'>商品編集</div></div>

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

                    <form action="{{ route('sample.update',['sample' => $item['id']]) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                            <div class='text-center'><label for='image'>商品画像</label></div>
                            <img src="{{ asset($item['image']) }}"  class="card-img-top" alt="...">
                            <div class='text-center'><input type='file' name='image' value="{{old('image',$item['image'])}}"/></div>
                            <div class='text-center'><label for='name' class='mt-2'>商品名</label></div>
                                <input type='text' class='form-control' name='name' value="{{old('name',$item['name'])}}"/> 
                            <div class='text-center'><label for='text' class='mt-2'>商品説明文</label></div>
                                <textarea class='form-control' name='text'>{{old('text',$item['text'])}}</textarea>
                            <div class='text-center'><label for='amount'>金額</label></div>
                                <input type='text' class='form-control' name='amount' value="{{old('amount',$item['amount'])}}"/>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>編集登録する</button>
                            </div> 
                        </form>

                
                    
                </div>
            </div>
        </div>
    </div>
</div>             
@endsection