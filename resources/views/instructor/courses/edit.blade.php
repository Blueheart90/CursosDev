<x-instructor-layout>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>
    <h1 class="text-2xl font-bold uppercase ">Información del curso</h1>
    <hr class="mt-2 mb-6 ">
    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => 'true']) !!}
        @include('instructor.courses.partials.form')
        <div class="flex justify-end">
            {!! Form::submit('Actualizar', $attributes  = ['class' => 'cursor-pointer px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md']) !!}
        </div>
    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/course/form.js') }}"></script>
    </x-slot>
</x-instructor-layout>