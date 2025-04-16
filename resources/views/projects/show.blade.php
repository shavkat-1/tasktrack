@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
        Проект: {{ $project->title }}
    </h1>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Описание</h2>
            <p class="text-gray-600 dark:text-gray-300 mt-1">{{ $project->description ?? '—' }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Дедлайн</h2>
            <p class="text-gray-600 dark:text-gray-300 mt-1">
                {{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('d.m.Y') : 'Не указан' }}
            </p>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('projects.edit', $project) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                ✏️ Редактировать
            </a>
            <form method="POST" action="{{ route('projects.destroy', $project) }}"
                  onsubmit="return confirm('Удалить проект?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                    🗑️ Удалить
                </button>
            </form>
        </div>
    </div>
@endsection

<hr class="my-6">

<h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Задачи</h2>

@if ($project->tasks->count())
    <ul class="space-y-2">
        @foreach ($project->tasks as $task)
            <li class="bg-gray-50 dark:bg-gray-700 p-4 rounded shadow">
                <div class="flex justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $task->title }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $task->description }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            Статус: <strong>{{ $task->status }}</strong> |
                            Приоритет: <strong>{{ $task->priority }}</strong> |
                            Дедлайн: {{ $task->due_date ?? '—' }}
                        </p>
                    </div>
                    {{-- Можно добавить действия тут позже --}}
                </div>
            </li>
        @endforeach
    </ul>
@else
    <p class="text-gray-600 dark:text-gray-400">Нет задач.</p>
@endif
