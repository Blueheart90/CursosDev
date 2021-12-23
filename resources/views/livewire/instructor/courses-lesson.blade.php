<div>
    @forelse ($section->lessons as $item)
        <article class="mt-4 card">
            <div class="card-body">
                @if ($lesson->is($item))
                    <form wire:submit.prevent='update'>
                        <div class="flex items-center">
                            <label class="w-32" for="">Nombre: </label>
                            <input wire:model='lesson.name' class="w-full rounded-md " placeholder="Ingrese el nombre de la sección" type="text">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-500 ">{{ $message }}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32" for="">Plataforma: </label>
                            <select wire:model='lesson.platform_id' class="w-full rounded-md">
                                @foreach ($platforms as $platform)
                                    <option {{ $platform->id == $item->platform->id ? 'selected' : '' }}  value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="flex items-center mt-4">
                            <label class="w-32" for="">Url: </label>
                            <input wire:model='lesson.url' class="w-full rounded-md " placeholder="Ingrese el nombre de la sección" type="text">
                        </div>
                        @error('lesson.url')
                            <span class="text-xs text-red-500 ">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="px-4 py-2 ml-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Actualizar</button>
                            <button type="button" wire:click='cancel' class="px-4 py-2 ml-2 text-white bg-red-500 rounded-md hover:bg-red-600">Cancelar</button>
                        </div>
                    </form>
                @else
                    <header>
                        <h1><i class="mr-1 text-blue-500 far fa-play-circle"></i> <strong>Lección: </strong>{{$item->name}} </h1>
                    </header> 
                    <div>
                        <hr class="my-2 ">
                        <p class="text-sm ">Plataforma: {{ $item->platform->name }}</p>
                        <p class="text-sm ">Enlace: <a class="text-blue-600 " href="{{ $item->url }}" target="_blank" rel="noopener noreferrer">{{ $item->url }}</a></p>
                        <div class="my-2 ">
                            <button wire:click='edit({{ $item }})' class="px-4 py-2 ml-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">Editar</button>
                            <button wire:click='destroy({{ $item }})' class="px-4 py-2 ml-2 text-sm text-white bg-red-500 rounded-md hover:bg-red-600">Eliminar</button>
                        </div>
                        <div>
                            <livewire:instructor.lesson-description :lesson='$item' :wire:key="$item->id">
                        </div>
                    </div> 
                @endif            
            </div>
        </article>
        

    @empty
        
    @endforelse
    <div class="mt-4 " x-data="{ open: false }">
        <a x-show="!open" @click="open = !open" class="flex items-center cursor-pointer ">
            <i class="mr-2 text-2xl text-green-500 far fa-plus-square"></i>
            Nueva Lección
        </a>
        <article class="card" x-show="open" x-cloak>
            <div class=" card-body">
                <h1 class="mb-4 text-xl font-bold">Agregar nueva lección</h1>
                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre: </label>
                        <input wire:model='name' class="w-full rounded-md " placeholder="Ingrese el nombre de la lección" type="text">
                    </div>
                    @error('name')
                        <span class="text-xs text-red-500 ">{{ $message }}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma: </label>
                        <select wire:model='platform_id' class="w-full rounded-md">
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="flex items-center mt-4">
                        <label class="w-32">Url: </label>
                        <input wire:model='url' class="w-full rounded-md " placeholder="Ingrese el nombre de la sección" type="text">
                    </div>
                    @error('url')
                        <span class="text-xs text-red-500 ">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-end mt-2">
                        <button wire:click='store' class="px-4 py-2 ml-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Agregar</button>
                        <button @click="open = false" class="px-4 py-2 ml-2 text-white bg-red-500 rounded-md hover:bg-red-600">Cancelar</button>
    
                    </div>
                </div>
            </div>

        </article>
    </div>
</div>
