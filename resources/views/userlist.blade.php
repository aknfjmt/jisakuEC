@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class='text-center'>ユーザーリスト</div></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                  
                    <table border="1" align="center" width="700">
                   
                    <tr>
                                        
                                        <th scope='col' >No.</th>
                                        <th scope='col'>ユーザー名</th>
                                        <th scope='col'>メールアドレス</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- ここに収入を表示する -->
                                      
                                        @foreach($users as $user)
                        <tr>
                        <th scope='col'>{{$user['id']}}</th>
                        <th scope='col'>{{$user['name']}}</th>
                        <th scope='col'>{{$user['email']}}</th>
                                    </tr>
                                    
                                    @endforeach
</table><br>


<div class='text-center'><a href="{{route('admin.page')}}" class="btn btn-outline-danger ">管理者ページに戻る</a></div></br>



                
                    
                </div>
            </div>
        </div>
    </div>
</div>             
@endsection