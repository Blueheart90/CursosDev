<div>
    <div class="py-4 mb-16 bg-gray-200">
        <div class="flex px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <button wire:click="resetFilters" class="h-12 px-4 mr-4 text-gray-700 bg-white rounded-lg shadow hover:bg-gray-300">
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
                        @foreach ($categories as $category)
                            
                            <li><a wire:click="$set('categoryId', {{$category->id}})" class="block px-4 py-2 transition ease-in-out cursor-pointer hover:bg-gray-300">{{ $category->name }}</a></li>
                        
                        @endforeach

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
                        @foreach ($levels as $level)
                            
                            <li><a wire:click="$set('levelId', {{$level->id}})" class="block px-4 py-2 transition ease-in-out cursor-pointer hover:bg-gray-300">{{ $level->name }}</a></li>
                        
                        @endforeach
                    </ul>                  
                </x-slot>
            </x-jet-dropdown>
        </div>
    </div>
    <div class="grid grid-cols-1 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
            
        @endforeach
    </div>
    <div class="px-4 mx-auto mt-4 mb-8 max-w-7xl sm:px-6 lg:px-8">

        {{ $courses->links() }}
    </div>
</div>
