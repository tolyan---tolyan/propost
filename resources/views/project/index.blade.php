
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Project</div>
                    <div class="panel-body">
                        <label for="name" class="col-md-4 control-label">Project</label>
                        <br>
                        <br>


                        @if ( count( $errors ) > 0 )
                            <ul class = "aler alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                        @endif

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Название</th>
                                <th scope="col">Фото</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>

                            </tr>
                            </thead>
                            <tbody>
                         
                                @foreach($projects as $project)
                                    <tr>
                                        <th scope="row">{{++$loop->index}}</th>
                                        <td>{{ link_to_route('project.show', $project->title,[$project->id]) }}</td>
                                        <td>
                                           Посмотреть фото
                                        </td>
                                        <td>
                                            {{link_to_route('project.edit', 'Edit', [$project->id], ['class'=>'btn btn-primary']) }}
                                        </td>

                                        <td>
                                            {!! Form::open(array('route'=>['project.destroy',$project->id],'method'=>'DELETE')) !!}
                                                {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                            @endforeach

                            </tbody>
                        </table>
                        {{link_to_route('project.create', 'Создать новый проект', null, ['class'=>'btn btn-success']) }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
