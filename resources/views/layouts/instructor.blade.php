<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- Importando awesome-font que viene con adminlte --}}
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <div class="container grid grid-cols-5 gap-6 py-8">
                <aside>
                    <h1 class="mb-4 text-lg font-bold ">Edicion del curso</h1>
                    <ul class="mb-4 text-sm text-gray-600">
                        <li class="pl-2 mb-1 leading-7 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @endif"><a href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a></li>
                        <li class="pl-2 mb-1 leading-7 border-l-4 {{request()->routeIs('instructor.courses.curriculum') ? 'border-indigo-400' : ''}}"><a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciónes del curso</a></li>
                        <li class="pl-2 mb-1 leading-7 border-l-4 {{request()->routeIs('instructor.courses.goals') ? 'border-indigo-400' : ''}}"><a href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a></li>
                        <li class="pl-2 mb-1 leading-7 border-l-4 {{request()->routeIs('instructor.courses.students') ? 'border-indigo-400' : ''}}"><a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a></li>
                        @isset($course->observation)
                            <li class="pl-2 mb-1 leading-7 border-l-4 {{request()->routeIs('instructor.courses.observation') ? 'border-indigo-400' : ''}}"><a href="{{ route('instructor.courses.observation', $course) }}">Observaciones</a></li>
                        @endisset
                    </ul>
                    @switch($course->status)
                        @case(1)
                            <form action="{{ route('instructor.courses.status', $course) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 ml-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Solicitar revisión</button>
        
                            </form>
                            @break
                        @case(2)
                            <div class="text-gray-500 card">
                                <div class="card-body">
                                    El curso se encuentra en revisión

                                </div>
                            </div>
                            @break
                        @case(3)
                            <div class="text-gray-500 card">
                                <div class="card-body">
                                    El curso esta publicado
                                </div>
                            </div>
                            @break
                        @default
                            
                    @endswitch

                </aside>
                <div class="col-span-4 card">
                    <main class="text-gray-600 card-body">
                        {{$slot}}                      
                    </main>
                </div>
        
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        
        @if (isset($js))
            {{ $js }}
        @endif
    </body>
</html>
