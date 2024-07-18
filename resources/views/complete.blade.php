@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class='text-center' ><font size="4">ご購入ありがとうございました</font></div>
                    <br>
                    <div class='text-center'><a href="{{route('top')}}" class="btn btn-primary">TOPに戻る</a></div><br>


                
                    
                </div>
            </div>
        </div>
    </div>
</div>             
@endsection