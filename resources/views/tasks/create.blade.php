@extends('layouts.master')

@section('page', 'ایجاد تسک')

@section('content')
<div class="w-full p-3">
    <p class="text-xl pb-6 flex items-center font-estedad-bold">
        ایجاد تسک
    </p>
    <div>
        <form class="p-4 bg-white rounded-lg" action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-600 mb-2" for="title">عنوان</label>
                    <input
                        class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                        id="title" name="title" type="text" value="{{ old('title') }}"
                        required="">
                    @error('title')
                    <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-2" for="deadline">تاریخ پایان</label>
                    <input
                        class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                        id="deadline" name="deadline" type="date" value="{{ old('deadline') }}"
                        required="">
                    @error('deadline')
                    <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                <div>
                    <label class="block text-sm text-gray-600 mb-2" for="status">وضعیت</label>
                    <select
                        class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                        id="status" name="status" required="">
                        @foreach($statuses as $status)
                        <option value="{{ $status->value }}">
                            {{ $status->farsi() }}
                        </option>
                        @endforeach
                    </select>
                    @error('status')
                    <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-2" for="project_id">پروژه</label>
                    <select
                        class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                        id="project_id" name="project_id" required="">
                        @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                    @error('project_id')
                    <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="my-4">
                <label class="block text-sm text-gray-600 mb-2" for="description">توضیحات</label>
                <textarea rows="5" cols="10"
                    class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                    id="description" name="description" required="">{{ old('description') }}</textarea>
                @error('description')
                <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button
                    class="hover:cursor-pointer py-2 px-6 text-white font-light tracking-wider bg-blue-600 rounded-lg"
                    type="submit">ایجاد</button>
            </div>
        </form>
    </div>
</div>
@endsection