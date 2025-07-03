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
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1>Мои ссылки</h1>
        <form action="{{route('links.store')}}" method="POST">
            @csrf
            <input type="text" name="url" class="form-control" placeholder="URL" required>
            <button type="submit" class="btn">Создать</button>
        </form>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Ссылка</th>
                    <th>Сокращенная ссылка</th>
                    <th>Клики</th>
                    <th>&nbsp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                    <tr>
                        <td>{{ $link->url }}</td>
                        <td><a href="{{ $link->code }}" target="_blank">{{url('/')}}/{{ $link->code }}</a></td>
                        <td>{{ $link->click }}</td>
                        <td>
                            <a href="{{route('links.stats', $link->id)}}" target="_blank" class="btn" >Статистика</a>
                            <form action="{{route('links.destroy', $link->id)}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" onclick="return confirm('Вы действительно хотите удалить?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection