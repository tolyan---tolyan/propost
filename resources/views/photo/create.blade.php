@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить фото в проект</div>
                    <div class="panel-body">
                     
                        {!! Form::open(array('route' => 'photo.store')) !!}
                            <div class = "form-group">
                                {!! Form::label('name','Введите название') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                       
                            </div>
                            <div class = "form-group">
                                {!! Form::button('Создать', ['type' => 'submit', 'class' => 'btn btn-success']) !!}

                                <br>
                                <br>
                                {{link_to_route('project.index', 'Вернутся назад', null, ['class'=>'btn btn-primary']) }}

                            </div>
                        {!! Form::close() !!}
                    </div>


                    <script type="text/javascript">
                        $(document).ready(function() {
                          $(".btn-success").click(function(){ 
                              var html = $(".clone").html();
                              $(".increment").after(html);
                          });
                          $("body").on("click",".btn-danger",function(){ 
                              $(this).parents(".control-group").remove();
                          });
                        });
                    </script>



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
