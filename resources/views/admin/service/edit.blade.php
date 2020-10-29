@extends('admin.header.adminlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактирование записи справочника "Сервисы"</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{action('ServiceController@update', $id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-4">
                                    <label for="name">Имя:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="name" value="{{$service->name}}">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-12" style="margin-top:10px">
                                    <a href="/services" class="btn btn-dark">Назад</a>
                                    <button type="submit" class="btn btn-dark">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection