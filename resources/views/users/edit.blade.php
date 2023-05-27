@extends('layouts.admin')

@section('title', 'Update Users')
@section('content-header', 'Update Users')

@section('content')
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name">First Name</label> <!-- Use 'first_name' instead of 'name' -->
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label> <!-- Add 'last_name' field -->
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if ($user->roles->contains($role)) selected @endif>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection