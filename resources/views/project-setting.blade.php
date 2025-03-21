<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setting Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <strong>Ups!</strong> Ada yang salah.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Tampilkan jumlah Done -->
                    
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Setting Project
                            </h3>
                        </div>

                        <form action="{{ route('todo.store') }}" method="POST" class="p-6 space-y-4">
                            @csrf

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Project</label>
                                <input type="text" value="{{ $project_name }}" readonly
                                    class="w-full p-2 border border-gray-300 rounded dark:bg-gray-600 dark:border-gray-500 dark:text-white bg-gray-100 cursor-not-allowed">
                                <input type="hidden" name="project_name" value="{{ $project_name }}">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Todo</label>
                                <input type="text" name="name" placeholder="Nama Todo" required
                                    class="w-full p-2 border border-gray-300 rounded dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <input type="text" value="{{ $project_status }}" readonly
                                    class="w-full p-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                <input type="hidden" name="status" value="{{ $project_status }}">
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                <select id="category" name="category" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                           focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5
                                           dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                                           dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected disabled>Select category</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <button type="submit"
                                class="flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                       focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                                       dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Add Todo
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
