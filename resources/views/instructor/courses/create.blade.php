<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold uppercase ">Crear curso</h1>
                <hr class="mt-2 mb-6 ">
                {!! Form::open(['route' => 'instructor.courses.store', 'files' => 'true']) !!}
                    @include('instructor.courses.partials.form')
                    <div class="flex justify-end">
                        {!! Form::submit('Crear curso', $attributes  = ['class' => 'cursor-pointer px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md']) !!}
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