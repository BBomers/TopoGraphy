<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <button><a class="h" href="{{ route('student.dashboard') }}">Go to student dashboard</a><button>
                <br>
                <button><a class="h" href="{{ route('teacher.dashboard') }}">Go to teacher dashboard</a></button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    a:hover, .h:hover, button:hover  {
        color: red;
        font-size: 300px;
        transform: skew(30deg, 20deg);
    }
</style>
