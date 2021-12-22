<div>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>
    <h1 class="text-2xl font-bold uppercase ">Lecciones del curso</h1>
    <br class="mt-2 mb-6 ">

    @forelse ($course->sections as $item)
        
        <article class="mb-6 card">
            <div class="bg-gray-100 card-body">
                @if ($section->is($item))
                    <form wire:submit.prevent='update'>
                        <input wire:model='section.name' class="w-full rounded-md " placeholder="Ingrese el nombre de la sección" type="text">
                        @error('section.name')
                            <span class="text-xs text-red-500 ">{{ $message }}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex items-center justify-between">
                        <h1 class="cursor-pointer "><strong>Sección: </strong>{{$item->name}}</h1>
                        <div>
                            <i wire:click='edit({{ $item }})' class="text-blue-500 cursor-pointer fas fa-edit"></i>
                            <i wire:click='destroy({{ $item }})' class="text-red-500 cursor-pointer fas fa-eraser"></i>
                        </div>
                    </header>
                
                    
                @endif

            </div>
        </article>
    @empty
       <p> No hay lecciones aun.</p>
    @endforelse
    <div x-data="{ open: false }">
        <a x-show="!open" @click="open = !open" class="flex items-center cursor-pointer ">
            <i class="mr-2 text-2xl text-green-500 far fa-plus-square"></i>
            Nueva sección
        </a>
        <article class="card" x-show="open" x-cloak>
            <div class="card-body">
                <div class="bg-gray-100 card-body">
                    <h1 class="mb-4 text-xl font-bold">Agregar nueva sección</h1>
                    <div>
                        <input wire:model="newSectionName" class="w-full rounded-md" placeholder="Ingrese el nombre de la sección" type="text">
                        @error('newSectionName')
                            <span class="text-xs text-red-500 ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-2">
                        <button wire:click='store' class="px-4 py-2 ml-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Agregar</button>
                        <button @click="open = false" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-md hover:bg-red-600">Cancelar</button>

                    </div>
                </div>
    
            </div>
        </article>
    </div>
</div>
