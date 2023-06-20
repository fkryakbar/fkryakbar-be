@extends('layout')

@section('title', 'Login')


@section('content')
    <div class="flex justify-center items-center h-screen px-3">
        <div class="lg:w-[300px] w-full rounded-md border-[1px] border-gray-300 drop-shadow p-4">
            <h1 class="text-center text-2xl font-bold">Login</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="my-3 rounded p-3 bg-red-400 text-sm">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="" method="POST">
                @csrf
                <div class="mt-2">
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username or
                        Email</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="email" id="username" autocomplete="none"
                                value="{{ old('email') }}"
                                class="focus:outline-0 block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 sm:text-sm sm:leading-6"
                                placeholder="whoever@domain.com">
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="password" id="password" autocomplete="none"
                                class="focus:outline-0 block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 sm:text-sm sm:leading-6"
                                placeholder="********">
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button class="bg-black text-white px-2 py-1 font-bold text-sm rounded">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
