@extends('layouts.app')

@section('content')

<div class="max-w-screen-md mx-auto flex items-center mt-10">
    <div class="w-full bg-white rounded-xl px-10 py-8">

        <h2 class="text-3xl font-semibold mb-7">Laravel 10 CRUD <span class="font-normal text-slate-400">/ Show Product</span></h2>

        <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" readonly class="w-full bg-gray-50 border border-gray-300 px-4 py-2 rounded-md focus:outline-indigo-400">
            @error('name')
            <div class="text-red-600 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="block mb-1">Description</label>
            <textarea name="description" readonly class="w-full bg-gray-50 border border-gray-300 px-4 py-2 rounded-md focus:outline-indigo-400">{{ $product->description }}</textarea>
            @error('description')
            <div class="text-red-600 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="flex items-center justify-center gap-5">
            <a href="{{ route('products.index') }}" class="text-white bg-amber-500 px-8 py-2 rounded cursor-pointer">Back</a>
        </div>
        </form>
    </div>
</div>

@endsection
