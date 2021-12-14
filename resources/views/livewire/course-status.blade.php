<div class="mt-8 ">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2 ">
            {!! $current->iframe !!}
            {{ $current->name }}
        </div>
        <div class=" card">
            <div class="card-body">
                <h1>{{ $course->title }}</h1>
                <div class="flex items-center">
                    <figure>
                        <img src="{{ $course->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div>
                        <p>{{ $course->teacher->name }}</p>
                        <a class="text-blue-500 " href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                    </div>
                </div>
                <ul>
                    @forelse ($course->sections as $section)
                        <li>
                            <a class="font-bold " href="">{{ $section->name }}</a>
                            <ul>
                                @forelse ($section->lessons as $lesson)
                                    <li>
                                        <a href="">{{ $lesson->id }} 
                                            @if ($lesson->complete)
                                                completado
                                            @endif
                                        </a>

                                    </li>
                                @empty
                                    
                                @endforelse
                            </ul>
                        </li>
                        
                    @empty
                        
                    @endforelse
                </ul>
            </div>

        </div>

    </div>

</div>
