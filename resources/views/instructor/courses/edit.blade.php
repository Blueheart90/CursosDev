<x-app-layout>
    <div class="container grid grid-cols-5 py-8">
        <aside>
            <h1 class="mb-4 text-lg font-bold ">Edicion del curso</h1>
            <ul class="text-sm text-gray-600 ">
                <li class="pl-2 mb-1 leading-7 border-l-4 border-indigo-400 "><a href="">Información del curso</a></li>
                <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent "><a href=""></a>Lecciónes del curso</li>
                <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent "><a href=""></a>Metas del curso</li>
                <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent "><a href=""></a>Estudiantes</li>
            </ul>

        </aside>
        <div class="col-span-4 card">
            <div class="text-gray-600 card-body">
                <h1 class="text-2xl font-bold uppercase ">Información del curso</h1>
                <hr class="mt-2 mb-6 ">
                {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => 'true']) !!}
                    @include('instructor.courses.partials.form')
                    <div class="flex justify-end">
                        {!! Form::submit('Actualizar', $attributes  = ['class' => 'cursor-pointer px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md']) !!}
                    </div>
                {!! Form::close() !!}
                
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/course/form.js') }}"></script>
    </x-slot>
</x-app-layout>