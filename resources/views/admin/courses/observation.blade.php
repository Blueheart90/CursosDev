@extends('adminlte::page')

@section('title', 'CursosDev')

@section('content_header')
    <h1>Observacion del curso: {{ $course->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
                <div class="form-group">
                    {!! Form::label('body', 'Observaciones del curso') !!}
                    {!! Form::textarea('body', null) !!}
                    @error('body')
                        <strong class="text-sm text-danger ">{{ $message }}</strong>
                    @enderror
                </div>

                {!! Form::submit('Enviar observación', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        
        // CKEDITOR
        ClassicEditor
            .create( document.querySelector( '#body' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );
    </script>
@stop