@props(['question'])

<div
    class="flex items-center justify-between rounded p-3 text-black shadow shadow-blue-500/50 dark:bg-gray-800/50 dark:text-gray-400">
    <span>{{ $question->question }}</span>
    <div>
        <x-form :action="route('question.like', $question)">
            <button type="submit" class="flex items-start space-x-1 text-green-500">
                <x-icons.thumbs-up class="h-5 w-5 cursor-pointer text-green-500 hover:text-green-300" />
                <span>{{ $question->likes }}</span>
            </button>
        </x-form>

        <x-form :action="route('question.unlike', $question)">
            <button type="submit" class="flex items-start space-x-1 text-red-500">
                <x-icons.thumbs-down class="h-5 w-5 cursor-pointer text-red-500 hover:text-red-300" />
                <span>{{ $question->unlikes }}</span>
            </button>
        </x-form>
    </div>
</div>
