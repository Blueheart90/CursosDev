<section>
    <h1 class="text-2xl font-bold uppercase">Metas del curso</h1>
    <hr class="mt-2 mb-6 ">
    @forelse ($course->goals as $item)
        <article class="mt-4 card">
            <div class="bg-gray-100 card-body">
                @if ($goal->is($item))
                    <form wire:submit.prevent='update'>
                        <input wire:model='goal.name' class="w-full rounded-md " type="text">
                        @error('goal.name')
                            <span class="text-xs text-red-500 ">{{ $message }}</span>
                        @enderror
                    </form>
                @else             
                    <header class="flex justify-between">
                        <h1>{{$item->name}}</h1>
                        <div>
                            <i wire:click='edit({{ $item }})' class="text-blue-500 cursor-pointer fas fa-edit"></i>
                            <i wire:click='destroy({{ $item }})' class="ml-2 text-red-500 cursor-pointer fas fa-trash"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @empty
        <p>No hay metas para mostrar</p>
    @endforelse

    <div class="mt-4 " x-data="{ open: false }">
        <a x-show="!open" @click="open = !open" class="flex items-center cursor-pointer ">
            <i class="mr-2 text-2xl text-green-500 far fa-plus-square"></i>
            Nueva Meta
        </a>
        <article class="card" x-show="open" x-cloak>
            <div class="bg-gray-100 card-body">
                <form wire:submit.prevent='store'>
                    <input wire:model='name' placeholder="Ingresa nombre de la meta" class="w-full rounded-md " type="text">
                    @error('name')
                        <span class="text-xs text-red-500 ">{{ $message }}</span>
                    @enderror
                    <div class="flex justify-end mt-2 ">
                        <button type="submit" class="px-4 py-2 ml-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">Agregar Meta</button>
                        <button @click="open = false" type="button" class="px-4 py-2 ml-2 text-sm text-white bg-red-500 rounded-md hover:bg-red-600">Cancelar</button>
                    </div>
                </form>
            </div>
        </article>
    </div>
</section>
