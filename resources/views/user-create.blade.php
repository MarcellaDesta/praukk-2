<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Modal Content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                        {{-- <!-- Modal Header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200 dark:border-gray-600 rounded-t">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New Product</h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div> --}}

                        <!-- Modal Body -->
                        <form action="{{ route('project.store') }}" method="POST" class="p-4 md:p-5">
                            @csrf

                            <div class="grid gap-4 mb-4 grid-cols-2">

                                <!-- Name -->
                                <div class="col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="name" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                                        placeholder="Type product name">
                                    @error('name')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select id="status" name="status" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="In-Progres">In-Progres</option>
                                        <option value="Done">Done</option>
                                        <option value="Progres">Progres</option>
                                    </select>
                                    @error('status')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category" name="category" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="Website">Website</option>
                                        <option value="Mobile">Mobile</option>
                                        <option value="Dekstop">Dekstop</option>
                                    </select>
                                    @error('category')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                          <!-- Button Group -->
                        <div class="flex items-center space-x-4 mt-4">
                            <!-- Submit Button -->
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tambah Data
                            </button>

                            <!-- Back Button -->
                            <a href="{{ route('user-dashboard') }}"
                                onclick="return confirm('Yakin ingin kembali? Perubahan yang belum disimpan akan hilang!')"
                                class="bg-gray-500 text-white px-5 py-2.5 rounded hover:bg-gray-700">
                                Kembali
                            </a>
                        </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
