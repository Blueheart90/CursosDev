<x-app-layout>

    <section  
                style="
                    background: linear-gradient(-45deg,
                    rgba(229,93,135,.3), rgba(95,195,228,.3)),
                    url({{ asset('/img/home/people_1920_tiny.jpg') }})center center / cover no-repeat;"
                
    >

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-4xl font-bold text-white ">Domina la tecnologia web con CursosDev</h1>
                <p class="mt-2 mb-4 text-lg text-white">En CursosDev encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollo web </p>
                <livewire:search /> 
            </div>
            
        </div>

    </section>

    <section class="mt-24 ">
        <h1 class="mb-6 text-3xl text-center text-gray-600 uppercase ">Contenido</h1>

        <div class="grid grid-cols-1 px-4 mx-auto gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-w-7xl sm:px-6 lg:px-8">
            <article>
                <figure>
                    <img class="object-cover w-full rounded-lg h-36 " src="{{ asset('img/home/curso1.jpg') }}" alt="Foto del curso">
                </figure>
                <header class="mt-2 ">
                    <h1 class="mb-2 text-xl text-center text-gray-700">Cursos y proyectos</h1>
                </header>
                <p class="text-sm text-center text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>

            <article>
                <figure>
                    <img class="object-cover w-full rounded-lg h-36 " src="{{ asset('img/home/curso2.png') }}" alt="Foto del curso">
                </figure>
                <header class="mt-2 ">
                    <h1 class="mb-2 text-xl text-center text-gray-700">Buenas practicas</h1>
                </header>
                <p class="text-sm text-center text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>

            <article>
                <figure>
                    <img class="object-cover w-full rounded-lg h-36 " src="{{ asset('img/home/curso3.jpg') }}" alt="Foto del curso">
                </figure>
                <header class="mt-2 ">
                    <h1 class="mb-2 text-xl text-center text-gray-700">Logica de programación</h1>
                </header>
                <p class="text-sm text-center text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>

            <article>
                <figure>
                    <img class="object-cover w-full rounded-lg h-36 " src="{{ asset('img/home/curso4.png') }}" alt="Foto del curso">
                </figure>
                <header class="mt-2 ">
                    <h1 class="mb-2 text-xl text-center text-gray-700">Seguridad</h1>
                </header>
                <p class="text-sm text-center text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>

        </div>

    </section>

    <section class="mt-24 bg-gray-700">
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl text-center text-white">¿No sabes que curso tomar?</h1>
            <p class="text-center text-white ">Mira nuestro catálogo de cursos y filtralos por categoria o nivel</p>
            <div class="flex justify-center mt-4">
                <a href="{{ route('courses.index') }}" class="px-4 py-3 text-white bg-blue-500 rounded-md hover:bg-blue-600">Catálogo de Cursos</a>
            </div>
        </div>

    </section>

    <section class="my-24">
        <h1 class="mb-6 text-3xl text-center text-gray-600 uppercase ">Útimos Cursos</h1>
        <div class="flex justify-center">
            <p class="mb-6 text-sm text-center text-gray-500 ">Cursos hechos con esfuerzo y</p>
    
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>

        </div>

        <div class="grid grid-cols-1 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
                
            @endforeach
        </div>

    </section>

</x-app-layout>
