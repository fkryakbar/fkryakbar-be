@extends('layout')

@section('title', 'Statistics')


@section('content')
    <div class="flex gap-3">
        @include('components.sidebar')
        <div class="basis-[80%] h-screen p-2">
            <div class="w-full my-3 rounded p-3  shadow">
                <h1 class="text-2xl font-bold">Statistics</h1>
            </div>
            <div class="w-full rounded p-3 shadow">
                <div class="flex gap-3">
                    <div class="p-5 bg-green-500 rounded flex gap-2 items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-16 h-16">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                        <div>
                            <h1 class="font-bold">
                                Visitors
                            </h1>
                            <p>
                                @if ($statistics)
                                    {{ $statistics->visitors }}
                                @else
                                    0
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="p-5 bg-blue-500 rounded flex gap-2 items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-16 h-16">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <div>
                            <h1 class="font-bold">
                                Posts
                            </h1>
                            <p>
                                {{ count($posts) }}
                            </p>
                        </div>
                    </div>
                    <div class="p-5 bg-yellow-500 rounded flex gap-2 items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-16 h-16">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <div>
                            <h1 class="font-bold">
                                Feed Back
                            </h1>
                            <p>
                                {{ count($feedback) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
