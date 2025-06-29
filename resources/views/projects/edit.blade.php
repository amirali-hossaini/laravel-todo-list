@extends('layouts.master')

@section('page', 'ایجاد پروژه')

@section('content')
    <div class="w-full p-3">
        <p class="text-xl pb-6 flex items-center font-estedad-bold">
            ویرایش پروژه
        </p>
        <div>
            <form class="p-4 bg-white rounded-lg" action="{{ route('projects.update', $project) }}" method="POST">

                @csrf
                @method('PATCH')

                <div class="">
                    <label class="block text-sm text-gray-600 mb-2" for="title">عنوان</label>
                    <input
                        class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                        id="title" name="title" type="text" value="{{ old('title', $project->title) }}"
                        required="">
                    @error('title')
                        <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-gray-600 mb-2" for="description">توضیحات</label>
                    <textarea rows="5" cols="10"
                        class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                        id="description" name="description" required="">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-4">
                    <button
                        class="hover:cursor-pointer py-2 px-6 text-white font-light tracking-wider bg-blue-600 rounded-lg"
                        type="submit">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
@endsection
