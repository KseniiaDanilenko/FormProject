@extends('layouts.layout')
@section('content')
<div>
    <form method="POST" action="/submit">
        @csrf
    
        <label for="firstname">{{ __('form.firstname') }}</label>
        <input type="text" id="firstname" name="firstname"><br><br>
    
        <label for="lastname">{{ __('form.lastname') }}:</label>
        <input type="text" id="lastname" name="lastname"><br><br>
    
        <label for="description">{{ __('form.description') }}:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
    
        <button type="submit">{{ __('form.submit') }}</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
</div>
