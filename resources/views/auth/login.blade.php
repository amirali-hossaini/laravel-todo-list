@extends('auth.master')

@section('page', 'ورود به حساب')

@section('content')
    <form class="p-10 bg-white rounded-lg shadow max-w-[500px] mx-auto" action="{{ route('login') }}" method="POST">

        @csrf

        <div class="">
            <label class="block text-tertiary-gray mb-2" for="email">ایمیل</label>
            <input
                class="bg-primary-gray border border-secondary-gray text-tertiary-gray text-sm rounded-lg block w-full p-2.5"
                id="email" name="email" type="email" placeholder="someone@somewhere.com" dir="ltr" required>

            @error('email')
                <p class="text-sm text-red-600 my-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-4">
            <label class="block text-tertiary-gray mb-2" for="password">پسوورد</label>
            <input
                class="bg-primary-gray border border-secondary-gray text-tertiary-gray text-sm rounded-lg block w-full p-2.5"
                id="password" name="password" type="password" placeholder="**********" dir="ltr" required>
        </div>
        <div class="mt-4">
            <button class="px-6 py-2 bg-blue-600 rounded text-white hover:bg-blue-800 transition-all duration-300 hover:cursor-pointer"
                type="submit">ورود به حساب</button>
        </div>
    </form>
@endsection
