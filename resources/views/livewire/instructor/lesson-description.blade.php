<div>
    <article x-data="{ open: false }" class="card">
        <div class="bg-gray-100 card-body">
            <header @click="open = !open"  class="flex cursor-pointer">
                <h1 >Descripcion de la lección</h1>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2 transition duration-300 ease-in-out" :class="{'rotate-180 ' : open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </header>
            <div x-show="open" x-transition.duration.500ms x-cloak>
                <hr class="my-2">
                @if ($lesson->description)
                    <form wire:submit.prevent='update'>
                        <textarea wire:model='description.name' class="w-full"></textarea>
                        @error('description.name')
                            <span class="text-xs text-red-500 ">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end my-2">
                            <button type="submit"  class="px-4 py-2 ml-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">Actualizar</button>
                            <button type="button" wire:click='destroy({{ $lesson->description }})'  class="px-4 py-2 ml-2 text-sm text-white bg-red-500 rounded-md hover:bg-red-600">Eliminar</button>
                        </div>
                    </form>
                @else
                    <p class="mb-2">Crear descripción</p>
                    <div>
                        <textarea wire:model='name' placeholder="Ingresa la descripción de la lección" class="w-full"></textarea>
                        @error('name')
                            <span class="text-xs text-red-500 ">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end my-2">
                            <button wire:click='store' class="px-4 py-2 ml-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">Agregar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
