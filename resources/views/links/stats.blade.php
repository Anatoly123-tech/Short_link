@extends('app')
@section('content')
<style>
    .container{
        background-color: #bb1d38;
        padding: 15px;
        color: #ffebf2;;
        border-radius: 10px;
    }
    .container h1{
        text-align: center;
    }
    .form-control{
        margin-bottom: 10px;
    }
    .btn{
        background-color: #ffebf2;
        color: #bb1d38;
    }
    .btn:hover{
        background-color: #bb1d37b0;
        color: #ffebf2;
    }
</style>
    <div class="container">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>IP адресс</th>
                    <th>Время клика</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clicklinks as $click)
                    <tr>
                        <td>{{ $click->ip }}</td>
                        <td>{{ $click->clicked }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection