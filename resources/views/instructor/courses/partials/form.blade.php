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
        @isset($course)          
            <img id="picture" class="object-cover w-full h-64 " src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">
        @else
            <img id="picture" class="object-cover w-full h-64 " src="https://images.pexels.com/photos/5905709/pexels-photo-5905709.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Imagen del curso">
        @endisset

    </figure>
    <div>
        <p class="mb-2 ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, laudantium eveniet nam iste aliquid pariatur eaque quis neque provident inventore rem itaque quae doloribus, quam voluptas ipsam. Nisi, maiores placeat?</p>
        {!! Form::file('file', $attributes = ['class' => 'form-input w-full', 'id' => 'file']) !!}
    </div>
    
</div>
