@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Создать проект</h1>
@endsection

@section('content')
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('projects.store') }}">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Название</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Описание</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="deadline" class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Дедлайн</label>
                <input id="deadline" type="date" name="deadline" value="{{ old('deadline') }}"
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
@endsection
<div class="bg-red-500 text-white p-4 text-xl">
    Если фон красный — Tailwind работает!
</div>
