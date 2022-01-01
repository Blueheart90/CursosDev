<section>
    <h1 class="text-3xl font-bold mb-2">Reseñas</h1>

    @can('enrolled', $course)
        <article>
            @can('valued', $course)

                <textarea wire:model="comment" class=" w-full" rows="3" placeholder="Ingrese una reseña"></textarea>
                @error('comment')
                    <strong class="text-sm text-red-600 ">{{ $message }}</strong>
                @enderror
                <div class="flex items-center">
                    <button wire:click="store" class="block px-4 py-3 mr-4 text-center text-white bg-blue-500 rounded-md hover:bg-blue-600">Guardar</button>
                    <ul class="flex">

                        <li class="cursor-pointer mr-1" wire:click="$set('rating', 1)"><i class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray'}}-500"></i></li>
                        <li class="cursor-pointer mr-1" wire:click="$set('rating', 2)"><i class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray'}}-500"></i></li>
                        <li class="cursor-pointer mr-1" wire:click="$set('rating', 3)"><i class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray'}}-500"></i></li>
                        <li class="cursor-pointer mr-1" wire:click="$set('rating', 4)"><i class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray'}}-500"></i></li>
                        <li class="cursor-pointer mr-1" wire:click="$set('rating', 5)"><i class="fas fa-star text-{{ $rating == 5 ? 'yellow' : 'gray'}}-500"></i></li>
        
                    </ul>
                </div>
            @else
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>El curso ya lo valoraste.</p>
                </div>
            @endcan
        </article>
        
    @endcan

    <p class=" text-gray-800 text-xl">{{ $course->reviews->count() }} valoraciones</p>
    @forelse ($course->reviews as $review)
        <article class="flex mb-4 items-center text-gray-800">
            <figure class=" mr-4">
                <img class=" h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $review->user->profile_photo_url }}" alt="Imagen usuario">
            </figure>
            <div class="card flex-1">
                <div class=" card-body bg-gray-100">
                    <p><b>{{ $review->user->name }}</b><i class="fas fa-star text-yellow-500"></i>({{ $review->rating }})</p>
                    {{ $review->comment }}
                </div>

            </div>
        </article>
    @empty
        <p>No hay valoraciones aún</p>
    @endforelse

</section>
