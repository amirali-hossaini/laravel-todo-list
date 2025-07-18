@extends('layouts.master')

@section('page', 'تسک ها')

@section('content')

<div class="w-full h-screen overflow-x-hidden flex flex-col">

    <main class="w-full flex-grow">
        <div class="w-full p-3 mt-2">

            <div class="flex items-center justify-between mb-4">
                <h1 class="w-full text-xl font-estedad-bold text-black pb-4">
                    تسک ها
                </h1>

                <a href="{{ route('tasks.create') }}"
                    class="py-2 px-6 rounded-lg bg-blue-600 text-white flex items-center justify-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    تسک
                </a>
            </div>

            <div class="bg-white overflow-auto rounded-lg">
                <table class="text-center w-full border-collapse text-sm">
                    <thead>
                        <tr class="text-grey-dark border-b border-secondary-gray bg-grey-lightest">
                            <th class="py-4 px-6 font-normal font-estedad-bold">
                                عنوان
                            </th>
                            <th class="py-4 px-6 font-normal font-estedad-bold">
                                پروژه
                            </th>
                            <th class="py-4 px-6 font-normal font-estedad-bold">
                                تاریخ پایان
                            </th>
                            <th class="py-4 px-6 font-normal font-estedad-bold">
                                وضعیت
                            </th>
                            <th class="py-4 px-6 font-normal font-estedad-bold">
                                مدیریت
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr class="hover:bg-grey-lighter border-b border-secondary-gray">
                            <td class="py-4 px-6">{{ $task->title }}</td>
                            <td class="py-4 px-6">{{ $task->project->title }}</td>
                            <td class="py-4 px-6">
                                {{ $task->deadline->format('Y-m-d') }}
                            </td>
                            <td>
                                <span
                                    class="py-4 px-6">
                                    {{ $task->status->farsi() }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('tasks.edit', $task) }}" class="text-lg text-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="post"
                                        class="flex items-center justify-center">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-lg text-red-600"
                                            onclick="return confirm('آیا از حذف این تسک اطمینان دارید ؟.')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="bg-blue-200 p-3">
                                تسکی ای جهت نمایش وجود ندارد.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</div>

@endsection