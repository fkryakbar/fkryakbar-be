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
                <h1 class="text-2xl font-bold">Posts</h1>
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
                                            <th scope="col" class="px-6 py-4">Slug</th>
                                            <th scope="col" class="px-6 py-4">Likes</th>
                                            <th scope="col" class="px-6 py-4">Views</th>
                                            <th scope="col" class="px-6 py-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $i=> $post)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $i + 1 }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $post->slug }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $post->likes }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $post->views }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <button onclick="delete_stat('{{ $post->slug }}')"
                                                        class="bg-red-500 font-bold text-white p-2 text-sm rounded focus:scale-105 transition-all hover:bg-red-700">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="text-center font-bold">
                                                Counter Empty
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                <script>
                                    function delete_stat(slug) {
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
                                                window.location.href = `/posts/${slug}/delete`
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
