@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавление записи в справочник "Комнатности"</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{url('rooms')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Имя:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Например: Двухкомнатная">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="container" style="margin-top:10px">
                                    <a href="/rooms" class="btn btn-dark">Назад</a>
                                    <button type="submit" class="btn btn-dark">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection