<x-app-layout>
    <section  
                style="
                    background: linear-gradient(-45deg,
                    rgba(229,93,135,.3), rgba(95,195,228,.3)),
                    url({{ asset('/img/courses/cyberglasses-hero.jpg') }})center center / cover no-repeat;"
                
    >

        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-4xl font-bold text-white ">Los mejores cursos de programación GRATIS y en español.</h1>
                <p class="mt-2 mb-4 text-lg text-white">Si estás buscando mejorar tus conocimientos de programacion, este es tu lugar. </p>
                <div class="flex">
                    <input class="w-full transition bg-gray-200 focus:bg-white focus:ring-transparent focus:outline-none rounded-l-md" type="search" name="search" placeholder="¿Que quieres aprender hoy?">
                    <button class="px-3 text-white bg-blue-500 hover:bg-blue-600 rounded-r-md" type="submit">Buscar</button>
                </div>
            </div>
            
        </div>

    </section>

    <livewire:course-index /> 


</x-app-layout>