<x-instructor-layout :course="$course">
    <h1 class="text-2xl font-bold uppercase ">Observaciones del curso</h1>
    <hr class="mt-2 mb-6 ">

    <p>{!! $course->observation->body !!}</p>


</x-instructor-layout>