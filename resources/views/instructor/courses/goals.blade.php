<x-instructor-layout :course="$course">
    <div>
        <livewire:instructor.courses-goals :course='$course' :wire:key="'courses-goals' . $course->id">
    </div>
    <div class="my-8 ">
        <livewire:instructor.courses-requirements :course='$course' :wire:key="'courses-requirements' . $course->id">
    </div>
    <div>
        <livewire:instructor.courses-audiences :course='$course' :wire:key="'courses-audiences' . $course->id">
    </div>
</x-instructor-layout>