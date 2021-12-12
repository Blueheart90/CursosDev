@props(['course'])
<article class="card">
    <figure>
        <img class="object-cover w-full h-36" src="{{ Storage::url($course->image->url) }}" alt="Imagen del curso">
    </figure>
    <div class=" card-body">
        <h1 class="card-title ">
            {{ Str::limit($course->title, 30)}}
        </h1>
        <p class="mb-2 text-sm text-gray-500">Prof: {{ $course->teacher->name }}</p>
        <div class="flex justify-between">
            <ul class="flex text-sm">

                <li><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                <li><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                <li><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                <li><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                <li><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>

            </ul>

            <p class="text-sm text-gray-500 ">
                <i class="fas fa-users"></i>
                ({{ $course->students_count }})
            </p>

        </div>
        <a href="{{ route('courses.show', $course) }}" class="block w-full px-4 py-3 mt-4 text-center text-white bg-blue-500 rounded-md hover:bg-blue-600">Más información</a>
    </div>
</article>
        
