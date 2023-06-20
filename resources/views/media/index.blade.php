@extends('layout')

@section('title', 'Media')

@section('head')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('content')
    <div class="flex gap-3">
        @include('components.sidebar')
        <div class="basis-[80%] h-screen p-2">
            <div class="w-full my-3 rounded p-3 shadow flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold">Media</h1>
                </div>
            </div>
            <div class="w-full rounded p-3 shadow">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="my-3 rounded p-3 bg-red-400 text-sm">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <div class="flex flex-col">
                    @if (session()->has('message'))
                        <div class="bg-green-300 p-3 rounded mb-3">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-between items-center">
                            <div class="flex">
                                <Label for="file_input"
                                    class="p-2 bg-black rounded-l-md text-md font-bold text-white">Upload</Label>
                                <Label for="file_input"
                                    class="p-2 bg-gray-200 border-[1px] border-slate-500 rounded-r-md text-md text-gray-600">Select
                                    File</Label>
                            </div>
                            <input class="hidden" id="file_input" type="file" name="media[]" multiple>
                            <button type="submit"
                                class="p-2 text-sm rounded bg-green-500 text-white font-bold focus:scale-105 transition-all h-fit">Upload</button>
                        </div>
                    </form>
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">No</th>
                                            <th scope="col" class="px-6 py-4">Name</th>
                                            <th scope="col" class="px-6 py-4">Type</th>
                                            <th scope="col" class="px-6 py-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $i => $file)
                                            <tr>
                                                <td scope="col" class="px-6 py-4">{{ $i + 1 }}</td>
                                                <td scope="col" class="px-6 py-4">{{ $file->name }}</td>
                                                <td scope="col" class="px-6 py-4">{{ $file->type }}</td>
                                                <td scope="col" class="px-6 py-4">
                                                    <a href="{{ asset('storage/' . $file->media_path) }}" target="_blank"
                                                        class="p-1 text-xs rounded-lg bg-green-500 text-white font-bold focus:scale-105 transition-all h-fit">Open</a>
                                                    <button onclick="copy_link('{{ $file->media_path }}')"
                                                        class="p-1 text-xs rounded-lg bg-blue-500 text-white font-bold focus:scale-105 transition-all h-fit">Copy
                                                        Link</button>
                                                    <button onclick="delete_file('{{ $file->media_path }}')"
                                                        class="p-1 text-xs rounded-lg bg-red-500 text-white font-bold focus:scale-105 transition-all h-fit">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <script>
                                    function delete_file(path) {
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
                                                window.location.href = `/media/delete/${path}`
                                            }
                                        })
                                    }

                                    function copy_link(path) {
                                        navigator.clipboard.writeText(`{{ env('APP_URL') }}/storage/${path}`)
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
