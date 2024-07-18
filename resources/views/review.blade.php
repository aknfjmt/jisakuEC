@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class='text-center'>レビュー登録</div></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='text-center'><label for='title' class='mt-2'>タイトル</label></div>
                        <input type='text' class='form-control' name='title' value=""/> 
                        <div class='text-center'><label for='text' class='mt-2'>レビュー本文</label></div>
                        <textarea class='form-control' name='text'></textarea>
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