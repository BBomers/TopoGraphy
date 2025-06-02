<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hello ' . Auth::user()->name) }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        {{-- Your Students --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Your Students
            </h3>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
    @forelse($yourStudents as $student)
        <li class="p-4">
            <a href="{{ route('teacher.student.show', $student->id) }}"
               class="font-medium text-blue-600 hover:underline dark:text-blue-400"
            >
                {{ $student->name }}
            </a>
            <span class="text-sm text-gray-500 dark:text-gray-400">({{ $student->email }})</span>
        </li>
    @empty
        <li class="p-4 text-gray-500">You have no students assigned yet.</li>
    @endforelse
</ul>

        </div>

        {{-- Available Students --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Available Students to Invite
            </h3>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($students as $student)
                    <li class="flex items-center justify-between p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <div>
                            <span class="font-medium">{{ $student->name }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">({{ $student->email }})</span>
                        </div>
                        <form action="{{ route('teacher.invite', $student->id) }}" method="POST">
                            @csrf
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 
                                       bg-gray-800 text-white hover:bg-gray-900 
                                       dark:bg-gray-100 dark:text-gray-900 dark:hover:bg-white
                                       border border-transparent rounded-xl 
                                       font-semibold text-xs uppercase tracking-widest 
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 
                                       transition"
                            >
                                Invite
                            </button>
                        </form>
                    </li>
                @empty
                    <li class="p-4 text-gray-500">No students found.</li>
                @endforelse
            </ul>
        </div>

    </div>
</x-app-layout>
