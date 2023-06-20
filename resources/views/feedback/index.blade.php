@extends('layout')

@section('title', 'Posts')

@section('head')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('content')
    <div class="flex gap-3">
        @include('components.sidebar')
        <div class="basis-[80%] h-screen p-2">
            <div class="w-full my-3 rounded p-3  shadow">
                <h1 class="text-2xl font-bold">Feed Back</h1>
            </div>
            <div class="w-full rounded p-3 shadow">
                <div class="flex flex-col">
                    @if (session()->has('message'))
                        <div class="bg-green-300 p-3 rounded">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">No</th>
                                            <th scope="col" class="px-6 py-4">Name</th>
                                            <th scope="col" class="px-6 py-4">Feed back</th>
                                            <th scope="col" class="px-6 py-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($feedback as $i=> $item)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $i + 1 }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $item->name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $item->feedback }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <button onclick="delete_feedback('{{ $item->id }}')"
                                                        class="bg-red-500 font-bold text-white p-2 text-sm rounded focus:scale-105 transition-all hover:bg-red-700">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="text-center font-bold">
                                                Feed Back Empty
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <script>
                                    function delete_feedback(id) {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = `/feed-back/${id}/delete`
                                            }
                                        })
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
