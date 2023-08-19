@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                    <a href="{{route('logout')}}">Logout</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <br>
                    @if(Auth::user()->user_role == 'admin')
                    <a href="{{url('/admin')}}">Click to enter admin dashboard</a>
                    @else    
                    <a href="{{url('/')}}">Click to enter your url</a>
                    @endif
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
