<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create A Process') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header class="flex justify-between">
                            <div>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Create Process') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Create a process.') }}
                                </p>
                            </div>
                            <x-secondary-link-button href="{{ route('process.index') }}">
                                {{ __('Back') }}
                            </x-secondary-link-button>
                        </header>

                        <form method="post" action="{{ route('process.store') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('post')

                            <div>
                                <x-input-label for="index" :value="__('Index')" />
                                <x-text-input id="index" name="index" type="text" class="mt-1 block w-full" />
                            </div>

                            <div>
                                <h3 class="mb-4 font-semibold text-gray-700">Projects</h3>
                                <ul class="flex flex-wrap text-gray-900 p-2 border border-gray-200 rounded-lg">
                                    @forelse ($projects as $item)
                                        <li class="flex-grow m-1 bg-white border border-gray-200 rounded-md">
                                            <div class="flex items-center ps-3">
                                                <input id="{{ 'project_' . $item->id }}" name="projects[]"
                                                    type="checkbox" value="{{ $item->id }}"
                                                    class="w-4 h-4 text-blue-950 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-950 focus:ring-1">
                                                <label for="{{ 'project_' . $item->id }}"
                                                    class="w-full cursor-pointer py-3 ms-2 text-gray-900">
                                                    {{ $item->index }}
                                                </label>
                                            </div>
                                        </li>
                                    @empty
                                        <li>empty</li>
                                    @endforelse

                                </ul>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Create') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
