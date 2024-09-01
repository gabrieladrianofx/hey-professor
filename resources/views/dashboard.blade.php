<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Votes for question') }}
        </x-header>
    </x-slot>

    <x-container>
        <div class="space-y-2 dark:text-gray-400">

            <x-form get :action="route('dashboard')" class="flex justify-between">
                <x-text-input type="text" name="search" value="{{ request()->search }}" class="mr-2 w-full" />
                <x-btn.primary type="submit">Search</x-btn.primary>
            </x-form>

            @if ($questions->isEmpty())
                <div class="flex flex-col items-center justify-center space-y-3">
                    <x-draw.searching class="h-64 w-64" />
                    <span class="text-xl font-bold">Question Not Found</span>
                </div>
            @else
                @foreach ($questions as $item)
                    <x-question :question="$item" />
                @endforeach
                {{ $questions->withQueryString()->links() }}
            @endif
        </div>

    </x-container>
</x-app-layout>
