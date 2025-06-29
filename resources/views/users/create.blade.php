@extends('layouts.master')

@section('page', 'ایجاد کاربر')

@section('content')
    <div class="w-full p-3">
        <p class="text-xl pb-6 flex items-center font-estedad-bold">
            ایجاد کاربر
        </p>
        <div>
            <form class="p-4 bg-white rounded-lg" action="{{ route('users.store') }}" method="POST">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="">
                        <label class="block text-sm text-gray-600 mb-2" for="name">نام</label>
                        <input
                            class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                            id="name" name="name" type="text" value="{{ old('name') }}" required="">
                        @error('name')
                            <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label class="block text-sm text-gray-600 mb-2" for="email">ایمیل</label>
                        <input
                            class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                            id="email" name="email" type="email" value="{{ old('email') }}" required="">
                        @error('email')
                            <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-4">
                    <div class="">
                        <label class="block text-sm text-gray-600 mb-2" for="password">رمزعبور</label>
                        <input
                            class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                            id="password" name="password" type="password" value="{{ old('password') }}" required="">
                        @error('password')
                            <p class="my-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label class="block text-sm text-gray-600 mb-2" for="is_admin">نقش</label>
                        <select
                            class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                            id="is_admin" name="is_admin" required="">
                            <option value="0">کاربر</option>
                            <option value="1" {{ old('is_admin') ? 'selected' : '' }}>ادمین</option>
                        </select>
                    </div>
                    <div class="">
                        <label class="block text-sm text-gray-600 mb-2" for="email_verified">ایمیل</label>
                        <select
                            class="w-full p-2 text-gray-700 bg-primary-gray border border-secondary-gray rounded-lg focus:outline-0 focus:border-blue-600"
                            id="email_verified" name="email_verified" required="">
                            <option value="0">تایید نشده</option>
                            <option value="1" {{ old('email_verified') ? 'selected' : '' }}>تایید شده</option>
                        </select>
                    </div>
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
