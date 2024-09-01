<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('My Questions') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form post :action="route('question.store')">
            <x-textarea label="Question" name="question" />

            <x-btn.primary>Save</x-btn.primary>

            <x-btn.reset>Cancel</x-btn.reset>
        </x-form>

        <hr class="my-4 border-dashed border-gray-700">

        {{-- listagem drafts --}}
        <div class="dark: mb-1 font-bold uppercase text-gray-400">My Drafts</div>

        <div class="space-y-2 dark:text-gray-400">
            <x-table>
                <x-table.thead>
                    <x-table.thead-tr>
                        <x-table.thead-th>Drafts</x-table.thead-th>
                        <x-table.thead-th>Actions</x-table.thead-th>
                    </x-table.thead-tr>
                </x-table.thead>
                <x-table.body>
                    @foreach ($questions->where('draft', true) as $question)
                        <x-table.body-tr>
                            <x-table.body-th>{{ $question->question }}</x-table.body-th>
                            <x-table.body-td>
                                <x-form :action="route('question.destroy', $question)" delete
                                    onsubmit="return confirm('Tem certeza que deseja deletar?')">
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Deletar
                                    </button>
                                </x-form>

                                <x-form :action="route('question.publish', $question)" put>
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Publicar
                                    </button>
                                </x-form>

                                <a href="{{ route('question.edit', $question) }}"
                                    class="text-blue-500 hover:underline">Edit</a>
                            </x-table.body-td>
                        </x-table.body-tr>
                    @endforeach
                </x-table.body>
            </x-table>
        </div>

        <hr class="my-4 border-dashed border-gray-700">

        {{-- listagem questions --}}
        <div class="dark: mb-1 font-bold uppercase text-gray-400">My Questions</div>

        <div class="space-y-2 dark:text-gray-400">
            <x-table>
                <x-table.thead>
                    <x-table.thead-tr>
                        <x-table.thead-th>Questions</x-table.thead-th>
                        <x-table.thead-th>Actions</x-table.thead-th>
                    </x-table.thead-tr>
                </x-table.thead>
                <x-table.body>
                    @foreach ($questions->where('draft', false) as $question)
                        <x-table.body-tr>
                            <x-table.body-th>{{ $question->question }}</x-table.body-th>
                            <x-table.body-td>
                                <x-form :action="route('question.destroy', $question)" delete
                                    onsubmit="return confirm('Tem certeza que deseja deletar?')">
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Deletar
                                    </button>
                                </x-form>

                                <x-form :action="route('question.archive', $question)" patch>
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Arquivar
                                    </button>
                                </x-form>
                            </x-table.body-td>
                        </x-table.body-tr>
                    @endforeach
                </x-table.body>
            </x-table>
        </div>

        <hr class="my-4 border-dashed border-gray-700">

        {{-- listagem arquived questions --}}
        <div class="dark: mb-1 font-bold uppercase text-gray-400">Archived Questions</div>

        <div class="space-y-2 dark:text-gray-400">
            <x-table>
                <x-table.thead>
                    <x-table.thead-tr>
                        <x-table.thead-th>Questions</x-table.thead-th>
                        <x-table.thead-th>Actions</x-table.thead-th>
                    </x-table.thead-tr>
                </x-table.thead>
                <x-table.body>
                    @foreach ($archivedQuestions->where('draft', false) as $question)
                        <x-table.body-tr>
                            <x-table.body-th>{{ $question->question }}</x-table.body-th>
                            <x-table.body-td>
                                <x-form :action="route('question.destroy', $question)" delete
                                    onsubmit="return confirm('Tem certeza que deseja deletar?')">
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Deletar
                                    </button>
                                </x-form>

                                <x-form :action="route('question.restore', $question)" patch>
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Restored
                                    </button>
                                </x-form>
                            </x-table.body-td>
                        </x-table.body-tr>
                    @endforeach
                </x-table.body>
            </x-table>
        </div>
    </x-container>
</x-app-layout>
