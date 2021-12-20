<div class="container py-8">
    <x-table-responsive>
        <div class="px-6 py-4 ">
            <input wire:model='search' class="w-full rounded-sm shadow-sm appearance-none" placeholder="Escriba un nombre del curso" type="search">
        </div>
        @if ($courses->isEmpty())

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
                        Matriculados
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Calificación
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-10 h-10 rounded-full" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $course->title }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $course->category->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $course->students_count}}</div>
                                <div class="text-sm text-gray-500">Alumnos</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $course->rating ?? 'Sin calificación' }}
                                    <ul class="flex text-sm">

                                        <li><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                                        <li><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
                        
                                    </ul>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $status = $course->status;
    
                                    $statusArray = match ($status) {
                                        '1' => array('name' => 'Borrador', 'color' => 'red'),
                                        '2' => array('name' => 'Revision', 'color' => 'blue'),
                                        '3' => array('name' => 'Publicado', 'color' => 'green'),
                                        default => 'Invalid Input !',
                                    };    
                                @endphp

                                <span @class([
                                    'inline-flex px-2 text-xs font-semibold leading-5  rounded-full',
                                    'bg-blue-200 text-blue-600' => $statusArray['color'] == 'blue' ,
                                    'bg-red-200 text-red-600' => $statusArray['color'] == 'red' ,
                                    'bg-green-200 text-green-600' => $statusArray['color'] == 'green' ,
                                ])>
                                {{ $statusArray['name'] }}
                                </span>



                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <a href="{{ route('instructor.courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>          
                                            
                    @endforeach
                <!-- More people... -->
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $courses->links() }}
            </div>
        @endif
    </x-table-responsive>

</div>
