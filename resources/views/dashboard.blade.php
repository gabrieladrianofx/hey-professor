<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Dashboard') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form post :action="route('question.store')">
            <x-textarea label="Question" name="question" />

            <x-btn.primary>Save</x-btn.primary>

            <x-btn.reset>Cancel</x-btn.reset>
        </x-form>

        <hr class="my-4 border-dashed border-gray-700">

        {{-- listagem --}}
        <div class="dark: mb-1 font-bold uppercase text-gray-400">List od Questions</div>

        <div class="space-y-2 dark:text-gray-400">
            @foreach ($questions as $item)
                <x-question :question="$item" />
            @endforeach
        </div>

    </x-container>
</x-app-layout>
