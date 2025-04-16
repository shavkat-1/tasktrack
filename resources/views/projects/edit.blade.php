@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Редактировать проект</h1>
@endsection

@section('content')
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
        <form method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Название</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Описание</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Дедлайн</label>
                <input type="date" name="deadline" value="{{ old('deadline', $project->deadline) }}"
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Обновить
                </button>
            </div>
        </form>
    </div>
@endsection
