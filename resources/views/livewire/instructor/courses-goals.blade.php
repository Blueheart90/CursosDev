<section>
    <h1 class="text-2xl font-bold uppercase">Metas del curso</h1>
    <hr class="mt-2 mb-6 ">
    @forelse ($course->goals as $item)
        <article class="mt-4 card">
            <div class="bg-gray-100 card-body">
                @if ($goal->is($item))
                    <form wire:submit.prevent='update'>
                        <input wire:model='goal.name' class="w-full rounded-sm " type="text">
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
    Goals: {{$course->title}}
</section>
