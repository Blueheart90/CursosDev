<div>
    <div class="py-4 mb-16 bg-gray-200">
        <div class="flex px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <button class="h-12 px-4 mr-4 text-gray-700 bg-white rounded-lg shadow hover:bg-gray-300">
                <i class="mr-2 text-sm fas fa-globe"></i>
                Todos los cursos
            </button>
            
            {{-- Dropdown categorias --}}
            <x-jet-dropdown align="left" width="48" contentClasses=" py-0 bg-white overflow-hidden">
                <x-slot name="trigger">                  
                    <button class="h-12 px-4 mr-4 text-gray-700 bg-white rounded-lg shadow hover:bg-gray-300">
                        <i class="mr-2 text-sm fas fa-tag"></i>
                        Categorias
                        <i class="ml-2 text-sm fas fa-chevron-down"></i>
                    </button>

                </x-slot>
                <x-slot name="content">
                    <ul class="text-gray-700 divide-y divide-gray-300">
                        <li><a class="block px-4 py-2 transition ease-in-out hover:bg-gray-300 " href="">Desarrollo web</a></li>
                        <li><a class="block px-4 py-2 transition ease-in-out hover:bg-gray-300 " href="">Diseño web</a></li>
                        <li><a class="block px-4 py-2 transition ease-in-out hover:bg-gray-300 " href="">Diseño web</a></li>
                    </ul>                  
                </x-slot>
            </x-jet-dropdown>

            {{-- Dropdown niveles --}}
            <x-jet-dropdown align="left" width="48" contentClasses=" py-0 bg-white overflow-hidden">
                <x-slot name="trigger">                  
                    <button class="h-12 px-4 mr-4 text-gray-700 bg-white rounded-lg shadow hover:bg-gray-300">
                        <i class="mr-2 text-sm fas fa-layer-group"></i>
                        Niveles
                        <i class="ml-2 text-sm fas fa-chevron-down"></i>
                    </button>

                </x-slot>
                <x-slot name="content">
                    <ul class="text-gray-700 divide-y divide-gray-300">
                        <li><a class="block px-4 py-2 transition ease-in-out hover:bg-gray-300 " href="">Nivel basico</a></li>
                        <li><a class="block px-4 py-2 transition ease-in-out hover:bg-gray-300 " href="">Nivel intermedio</a></li>
                        <li><a class="block px-4 py-2 transition ease-in-out hover:bg-gray-300 " href="">Nivel avanzado</a></li>
                    </ul>                  
                </x-slot>
            </x-jet-dropdown>
        </div>
    </div>
    <div class="grid grid-cols-1 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($courses as $course)
            <article class="overflow-hidden bg-white rounded shadow-lg">
                <figure>
                    <img class="object-cover w-full h-36" src="{{ Storage::url($course->image->url) }}" alt="Imagen del curso">
                </figure>
                <div class="px-6 py-4 ">
                    <h1 class="mb-2 text-xl leading-6 text-gray-700 ">
                        {{ Str::limit($course->title, 30)}}
                    </h1>
                    <p class="mb-2 text-sm text-gray-500">Prof: {{ $course->teacher->name }}</p>
                    <div class="flex justify-between">
                        <ul class="flex text-sm">

                            <li><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                            <li><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                            <li><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                            <li><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                            <li><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>

                        </ul>

                        <p class="text-sm text-gray-500 ">
                            <i class="fas fa-users"></i>
                            ({{ $course->students_count }})
                        </p>

                    </div>
                    <a href="{{ route('courses.show', $course) }}" class="block w-full px-4 py-3 mt-4 text-center text-white bg-blue-500 rounded-md hover:bg-blue-600">Más información</a>
                </div>
            </article>
            
        @endforeach
    </div>
    <div class="px-4 mx-auto mt-4 mb-8 max-w-7xl sm:px-6 lg:px-8">

        {{ $courses->links() }}
    </div>
</div>
