<x-app-layout>
    <div class="container grid grid-cols-5 py-8">
        <aside>
            <h1 class="mb-4 text-lg font-bold ">Edicion del curso</h1>
            <ul class="text-sm text-gray-600 ">
                <li class="pl-2 mb-1 leading-7 border-l-4 border-indigo-400 "><a href="">Información del curso</a></li>
                <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent "><a href=""></a>Lecciónes del curso</li>
                <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent "><a href=""></a>Metas del curso</li>
                <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent "><a href=""></a>Estudiantes</li>
            </ul>

        </aside>
        <div class="col-span-4 card">
            <div class="text-gray-600 card-body">
                <h1 class="text-2xl font-bold uppercase ">Información del curso</h1>
                <hr class="mt-2 mb-6 ">
                {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => 'true']) !!}
                    <div class="mb-4">
                        {!! Form::label('title', 'Titulo del curso') !!}
                        {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1 rounded-md']) !!}
                    </div>
                    <div class="mb-4">
                        {!! Form::label('slug', 'Slug del curso') !!}
                        {!! Form::text('slug', null, ['class' => 'form-input block w-full mt-1 rounded-md']) !!}
                    </div>
                    <div class="mb-4">
                        {!! Form::label('subtitle', 'Subtitulo del curso') !!}
                        {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1 rounded-md']) !!}
                    </div>
                    <div class="mb-4">
                        {!! Form::label('description', 'Descripción del curso') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1 rounded-md']) !!}
                    </div>
                    <div class="grid grid-cols-3 gap-4 ">
                        <div>
                            {!! Form::label('category_id', 'Categoría') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 rounded-md']) !!}
                        </div>
                        <div>
                            {!! Form::label('level_id', 'Nivel') !!}
                            {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 rounded-md']) !!}
                        </div>
                        <div>
                            {!! Form::label('price_id', 'Precio') !!}
                            {!! Form::select('price_id', $pricies, null, ['class' => 'form-input block w-full mt-1 rounded-md']) !!}
                        </div>

                    </div>
                    <h1 class="mt-8 mb-2 text-2xl font-bold">Imagen del curso</h1>
                    <div class="grid grid-cols-2 gap-4 ">
                        <figure>
                            <img id="picture" class="object-cover w-full h-64 " src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
                        </figure>
                        <div>
                            <p class="mb-2 ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, laudantium eveniet nam iste aliquid pariatur eaque quis neque provident inventore rem itaque quae doloribus, quam voluptas ipsam. Nisi, maiores placeat?</p>
                            {!! Form::file('file', $attributes = ['class' => 'form-input w-full', 'id' => 'file']) !!}
                        </div>
                        
                    </div>
                    <div class="flex justify-end">
                        {!! Form::submit('Actualizar', $attributes  = ['class' => 'cursor-pointer px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md']) !!}
                    </div>
                {!! Form::close() !!}
                
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        <script>
            //Slug automático
            document.getElementById("title").addEventListener('keyup', slugChange);

            function slugChange(){
                
                title = document.getElementById("title").value;
                document.getElementById("slug").value = slug(title);

            }

            function slug (str) {
                var $slug = '';
                var trimmed = str.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }


            //CKEDITOR

            ClassicEditor
                .create( document.querySelector( '#description' ), {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                        ]
                    }
                } )
                .catch( error => {
                    console.log( error );
                } );

            //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);

            function cambiarImagen(event){
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result); 
                };

                reader.readAsDataURL(file);
            }
        </script>
    </x-slot>
</x-app-layout>