<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-2xl font-bold mb-4">Todolist</h2>

                    <!-- Alert Berhasil -->
                    @if (session('success'))
                    <div id="success-alert" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(() => {
                            const alert = document.getElementById('success-alert');
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 3000); // 3 detik
                    </script>
                @endif

                    <!-- Total Todo Selesai -->
                    <p class="text-lg font-semibold text-green-600 mb-4">
                        Total Point : {{ $doneCount }}
                    </p>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-4">Data Project:</h3>

                        @if($todos->count())
                            <div class="overflow-x-auto rounded-lg shadow">
                                <table class="min-w-full text-left text-sm">
                                    <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                        <tr>
                                            <th class="px-6 py-3">No</th>
                                            <th class="px-6 py-3">Name</th>
                                            <th class="px-6 py-3">Status</th>
                                            <th class="px-6 py-3">Category</th>
                                            <th class="px-6 py-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($todos as $key => $todo)
                                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <td class="px-6 py-4">{{ $key + 1 }}</td>
                                                <td class="px-6 py-4">{{ $todo->name }}</td>
                                                <td class="px-6 py-4">
                                                    @php
                                                        $statusColor = match($todo->status) {
                                                            'Done' => 'bg-green-500 text-white',
                                                            'In-Progres' => 'bg-red-400 text-black',
                                                            'Progres' => 'bg-blue-500 text-white',
                                                            default => 'bg-gray-300 text-black'
                                                        };
                                                    @endphp
                                                    <span class="px-2 py-1 rounded {{ $statusColor }}">
                                                        {{ $todo->status }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4">{{ $todo->category }}</td>
                                                <td class="px-6 py-4 flex gap-2">

                                                    <!-- Button Review -->
                                                    <a href="{{ route('todo.review', $todo->id) }}"
                                                       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-800">
                                                        Review
                                                    </a>

                                                    <!-- Button Delete -->
                                                    <form action="{{ route('todo.destroy', $todo->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Yakin ingin hapus?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800">
                                                            Delete
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-700 dark:text-gray-300">Belum ada data project.</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
