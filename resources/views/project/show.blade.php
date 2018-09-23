 @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading text-center "> Фотографии проекта <h4>{{$project->title}}</h4>

                        {!! Form::open(array('route' => 'photo.store', 'enctype'=>'multipart/form-data')) !!}
                            <div class = "form-group">
                               
                                {!! Form::file('name[]', ['class' => 'form-control','multiple' => 'multiple'] ) !!}
                                <input type="hidden" name="project_id" value="{{$project->id}}">                            </div>
                            <div class = "form-group">
                                {!! Form::button('Добавить фото', ['type' => 'submit', 'class' => 'btn btn-success']) !!}

                                <br>
                                <br>

                            </div>
                        {!! Form::close() !!}

                    </div>


                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Название</th>
                                <th scope="col">Фото</th>
                                <th scope="col">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                         
                            @foreach($project->photos as $photo)   

                                <tr>
                                        <th scope="row">{{++$loop->index}}</th>
                                        <td>{{$photo->name}}</td>
                                        <td>
                                           <img src='{{URL::asset("images/$project->id/$photo->name")}}' alt="profile Pic" height="200" width="200">

                                        </td>
                                        <td>
                                            {!! Form::open(array('route'=>['photo.destroy',$photo->id],'method'=>'DELETE')) !!}
                                                {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                 </tr>                  
                            @endforeach

                              

                            </tbody>
                        </table>



                    
                 


                    
                 

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
