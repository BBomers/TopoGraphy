<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student') . ' - ' . $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Scores</h3>

                @if($student->scores->isEmpty())
                    <p class="text-gray-500 dark:text-gray-400">No scores found for this student.</p>
                @else
                    <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-600">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Max Score</th>
                                <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Achieved Score</th>
                                <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student->scores as $score)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">{{ $score->max_score }}</td>
                                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">{{ $score->gehaalde_score }}</td>
                                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">{{ $score->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
