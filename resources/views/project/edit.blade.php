@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Project</div>
                    <div class="panel-body">
                        <label for="name" class="col-md-4 control-label">Изменить проект</label>
                        <br>
                        <br>
                        {!! Form::model($project, array('route' => ['project.update', $project->id], 'method'=>'PUT')) !!}
                            <div class = "form-group">
                                {!! Form::label('name','Введите название') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                               
                            </div>
                            <div class = "form-group">
                              {!! Form::button('Сохранить', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                              {{link_to_route('project.index', 'Вернутся назад', null, ['class'=>'btn btn-success']) }}
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
