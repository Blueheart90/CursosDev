<div>
    <h1 class="mb-4 text-2xl font-bold ">Estudiantes del curso</h1>
    <x-table-responsive>
        <div class="px-6 py-4 ">
            <input wire:model='search' class="w-full rounded-sm shadow-sm appearance-none" placeholder="Escriba el nombre del estudiante" type="search">
        </div>
        @if ($students->isEmpty())

            <div class="card-body">
                <i class="mr-2 fas fa-exclamation-circle"></i>
                <strong>
                    La busqueda no arrojó resultados
                </strong>
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Email
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
         
                                        <img class="object-cover object-center w-10 h-10 rounded-full" src="{{ $student->profile_photo_url }}" alt="Imagen de perfil">

                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $student->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $student->email}}</div>
                            </td>

                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a 
                                    href="" 
                                    class="text-indigo-600 hover:text-indigo-900">
                                    Ver
                                </a>
                            </td>
                        </tr>          
                                            
                    @endforeach
                <!-- More people... -->
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $students->links() }}
            </div>
        @endif
    </x-table-responsive>

</div>
