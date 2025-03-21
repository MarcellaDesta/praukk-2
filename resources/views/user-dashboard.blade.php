<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    @if (session('success'))
                        <div
                            x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 3000)"
                            x-show="show"
                            class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded transition duration-500 ease-in-out"
                        >
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('user-create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded mb-4">
                        Tambah
                    </a>

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Category
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($project as $pro)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pro->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            @php
                                                $statusColor = match($pro->status) {
                                                    'Done' => 'bg-green-500 text-white',
                                                    'In-Progres' => 'bg-red-400 text-black',
                                                    'Progres' => 'bg-blue-500 text-white',
                                                    default => 'bg-gray-300 text-black'
                                                };
                                            @endphp
                                            <span class="px-2 py-1 rounded {{ $statusColor }}">
                                                {{ $pro->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pro->category }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex justify-end items-center space-x-2">
                                                <form action="{{ route('user-destroy', $pro->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus todo ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                        Delete
                                                    </button>
                                                </form>

                                                <a href="{{ route('project.setting', $pro->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2.5 rounded-lg text-sm">
                                                    Setting
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Data project kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>

                        </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
