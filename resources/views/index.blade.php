@extends('layouts.master')

@section('page', 'خانه')

@section('content')

    <div class="w-full h-screen overflow-x-hidden flex flex-col">

        <main class="w-full flex-grow">

            <div class="grid grid-cols-3 rounded-lg p-3 gap-3">
                <div class="col-span-3 md:col-span-1 bg-white h-20 p-1 rounded-lg dark:bg-dark-secondary-black">
                    <div class="w-full flex items-center justify-around h-full">
                        <div class="flex items-start justify-between flex-col">
                            <p class="text-gray-400 mb-1">پروژه ها</p>
                            <p class="text-xl text-blue-600 font-mono">
                                {{ number_format(auth()->user()->projects()->count()) }}
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1 bg-white h-20 p-1 rounded-lg dark:bg-dark-secondary-black">
                    <div class="w-full flex items-center justify-around h-full">
                        <div class="flex items-start justify-between flex-col">
                            <p class="text-gray-400 mb-1">تسک ها</p>
                            <p class="text-xl text-blue-600 font-mono">
                                {{ number_format(auth()->user()->tasks()->count()) }}
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                        </svg>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1 bg-white h-20 p-1 rounded-lg dark:bg-dark-secondary-black">
                    <div class="w-full flex items-center justify-around h-full">
                        <div class="flex items-start justify-between flex-col">
                            <p class="text-gray-400 mb-1">نزدیک ترین تسک</p>
                            <p class="text-xl text-blue-600 font-mono">
                                {{ auth()->user()->tasks()->orderBy('deadline')->first()->deadline->format('Y-m-d') }}</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-10 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="w-full p-3 mt-2">

                <h1 class="w-full text-xl font-estedad-bold text-black pb-4">آخرین پروژه ها</h1>

                <div class="bg-white overflow-auto rounded-xl border border-secondary-gray">
                    <table class="text-center w-full border-collapse text-sm">
                        <thead>
                            <tr class="text-grey-dark border-b border-secondary-gray">
                                <th class="py-4 px-6 font-normal font-estedad-bold">
                                    عنوان
                                </th>
                                <th class="py-4 px-6 font-normal font-estedad-bold">
                                    توضیحات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr class="hover:bg-primary-gray border-b border-secondary-gray last:border-b-0">
                                    <td class="py-4 px-6">{{ $project->title }}</td>
                                    <td class="py-4 px-6">
                                        {{ Str::substr($project->description, 0, 100) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    </div>

@endsection
