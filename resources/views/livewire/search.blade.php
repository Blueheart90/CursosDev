<form class="relative flex" autocomplete="off">
    <input
        wire:model='search' 
        class="w-full transition bg-gray-200 focus:bg-white focus:ring-transparent focus:outline-none rounded-l-md" 
        type="search" 
        name="search" 
        placeholder="¿Que quieres aprender hoy?"
    >
    <button class="px-3 text-white bg-blue-500 hover:bg-blue-600 rounded-r-md" type="submit">Buscar</button>
    @if ($search)
        
        <ul class="absolute z-50 w-full mt-1 overflow-hidden bg-white rounded-lg top-full">
            @forelse ($this->results as $result)
                <a href="{{ route('courses.show', $result) }}">
                    <li class="px-5 text-sm leading-10 cursor-pointer hover:bg-gray-300 ">
                        {{ $result->title }}
                    </li> 
                </a>
            @empty
                <li class="px-5 text-sm leading-10 ">
                    No hay resultados...
                </li> 
            @endforelse

        </ul>
        
    @endif
</form>
