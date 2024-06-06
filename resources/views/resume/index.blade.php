<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Resume') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-end">
                    <a href="{{ route('resume.create') }}" class="px-4 py-2 text-gray-200 rounded-full cursor-pointer bg-violet-800">Создать</a>
                </div>

                @if (isset($resumes))

                    @foreach ($resumes as $resume)
                        @include('resume.partials.index-resumes-form', ['resume' => $resume,'genders' => $genders,'cities' => $cities])
                    @endforeach
                @else
                    <p class="py-64 text-xl font-semibold leading-tight text-center text-gray-800 dark:text-gray-200">У вас нет резюме</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
