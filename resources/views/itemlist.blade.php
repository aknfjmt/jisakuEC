@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class='text-center'>商品リスト</div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class='text-center'><a href="{{route('sample.create')}}" class="btn btn-outline-danger">商品登録</a></div><br>
                    
                    <table border="1" align="center" width="700">
                        <tr>
                        <th scope='col' >No.</th>
                        <th scope='col'>商品名</th>
                        <th scope='col'>金額</th>
                        <th scope='col' >編集</th>
                        <th scope='col'>非表示</th>
                        <th scope='col'>削除</th>
                        </tr>
                        
                        @foreach($items as $item)
                        <tr>
                        <th scope='col'>{{$item['id']}}</th>
                        <th scope='col'>{{$item['name']}}</th>
                        <th scope='col'>{{$item['amount']}}</th>
                        <th scope='col'><a href="{{route('sample.edit',['sample' => $item['id']])}}">編集</a></th>
                        <th scope='col'><a href="{{route('item.hidden',['id' => $item['id']])}}">非表示</a></th>
                        <th scope='col'><form style="display:inline" action="{{ route('sample.destroy',['sample' => $item['id']])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-1">
                            {{ __('削除') }}
                        </button>
                        </form></th>
                        @endforeach
                        </tr>
                    </table><br>
                    
                    <div class='text-center'><a href="{{route('admin.page')}}" class="btn btn-outline-danger ">管理者ページに戻る</a></div></br>
                </div>
            </div>
        </div>
    </div>
</div>             
@endsection