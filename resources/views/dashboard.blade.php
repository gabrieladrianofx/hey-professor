<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Votes for question') }}
        </x-header>
    </x-slot>

    <x-container>
        <div class="space-y-2 dark:text-gray-400">
            @foreach ($questions as $item)
                <x-question :question="$item" />
            @endforeach
            {{ $questions->links() }}
        </div>

    </x-container>
</x-app-layout>
