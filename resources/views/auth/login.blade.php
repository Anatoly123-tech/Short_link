@extends('app')
@section('content')
<style>
    .container{
        background-color: #ffebf2;
        padding: 15px;
        color: #bb1d38;
        border-radius: 10px;
    }
    .container h1{
        text-align: center;
    }
    .form-control{
        margin-bottom: 10px;
    }
    .btn{
        display: block;
        margin: 0 auto;
        background-color: #bb1d38;
        color: #ffebf2;
    }
    .btn:hover{
        background-color: #bb1d37b0;
        color: #ffebf2;
    }
</style>
<div class="container">
    <h1>Авторизация</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <form action="{{route('auth.login')}}" method="POST">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Логин">
        <input type="password" name="password" class="form-control" placeholder="Пароль">
        <button type="submit" class="btn">Авторизация</button>
    </form>
</div>
@endsection