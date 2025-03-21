<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Review & Update Status Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Alert Berhasil -->
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Alert -->
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

                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Review Todo</h3>
                        </div>

                        <form action="{{ route('todo-update-status', $todo->id) }}" method="POST" class="p-6 space-y-4">
                            @csrf
                            @method('PATCH')

                            <!-- Nama Project -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Project</label>
                                <input type="text" value="{{ $todo->project?->name ?? '' }}" readonly
                                    class="w-full p-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed
                                           dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                            </div>

                            <!-- Nama Todo -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Todo</label>
                                <input type="text" value="{{ $todo->name }}" readonly
                                    class="w-full p-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed
                                           dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                <input type="text" value="{{ $todo->category }}" readonly
                                    class="w-full p-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed
                                           dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                            </div>

                            <!-- Status Update -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select name="status" required
                                    class="w-full p-2 border border-gray-300 rounded
                                           dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                    <option value="In-Progres" {{ $todo->status == 'In-Progres' ? 'selected' : '' }}>In-Progres</option>
                                    <option value="Progres" {{ $todo->status == 'Progres' ? 'selected' : '' }}>Progres</option>
                                    <option value="Done" {{ $todo->status == 'Done' ? 'selected' : '' }}>Done</option>
                                </select>
                            </div>

                            <!-- Tombol Update -->
                            <div class="flex gap-4">
                                <button type="submit"
                                    class="flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                           focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                                           dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Update Status
                                </button>

                                <a href="{{ route('todos') }}"
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
