@extends('layouts.app')

@section('content')

<div class="max-w-screen-md mx-auto flex items-center mt-10">
    <div class="w-full bg-white rounded-xl px-10 py-8">

        <h2 class="text-3xl font-semibold mb-7">Laravel 10 CRUD <span class="font-normal text-slate-400">/ Product Lists</span></h2>

        @if(session()->has('success'))
        <div class="border border-green-200 bg-green-50 px-4 py-2 rounded mb-5">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex items-center justify-end mb-5">
            <a href="{{ route('products.create') }}" class="text-white bg-indigo-500 px-4 py-2 rounded">Add New</a>
        </div>

        <div class="w-full border border-gray-200 dark:border-gray-500 rounded-xl overflow-x-auto">
            <table class="w-full divide-y divide-gray-200 dark:divide-gray-500">
            <thead class="bg-gray-50 dark:bg-slate-700 text-slate-800 dark:text-slate-300">
            <tr class="divide-x divide-gray-200 dark:divide-gray-500">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-500 bg-white dark:bg-slate-600 text-slate-800 dark:text-slate-300">
                @foreach ($products as $product)
                <tr class="divide-x divide-gray-200 dark:divide-gray-500">
                    <td class="px-4 py-2">{{ ++$i }}</td>
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">{{ $product->description }}</td>
                    <td class="px-4 py-2" style="width:150px;">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('products.show',$product->id) }}" class="bg-blue-800 text-white text-sm px-3 py-1 rounded">
                                show
                            </a>
                            <a href="{{ route('products.edit',$product->id) }}" class="bg-blue-500 text-white text-sm px-3 py-1 rounded">
                                edit
                            </a>
                            <div>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white text-sm px-3 py-1 rounded">delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="mt-5">
            {!! $products->links() !!}
        </div>
    </div>
</div>

@endsection
