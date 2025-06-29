<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreUserRequest, UpdateUserRequest};
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->latest()->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['email_verified_at'] = $validated['email_verified'] ? now() : null;

        User::query()->create($validated);

        toast('کاربر جدید ایجاد شد.', 'success');

        return to_route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $validated['email_verified_at'] = $validated['email_verified'] ? now() : null;

        if (is_null($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);

        toast('کاربر آپدیت شد.', 'success');

        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        toast('کاربر حذف شد.', 'info');

        return back();
    }
}
