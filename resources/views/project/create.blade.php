@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создать Проект</div>
                    <div class="panel-body">
                     
                        {!! Form::open(array('route' => 'project.store', 'enctype'=>'multipart/form-data')) !!}
                            <div class = "form-group">
                                {!! Form::label('label','Введите название') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                <br>
                                {!! Form::file('name[]', ['class' => 'form-control','multiple' => 'multiple'] ) !!}
                            </div>
                            <div class = "form-group">
                                {!! Form::button('Создать', ['type' => 'submit', 'class' => 'btn btn-success']) !!}

                                <br>
                                <br>
                                {{link_to_route('project.index', 'Вернутся назад', null, ['class'=>'btn btn-primary']) }}

                            </div>
                        {!! Form::close() !!}
                    </div>
                    @if ( count( $errors ) > 0 )
                        <ul class = "aler alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
