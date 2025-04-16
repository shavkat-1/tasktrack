@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Мои проекты</h1>
@endsection

@section('content')
    <div class="mb-6">
        <a href="{{ route('projects.create') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
            ➕ Новый проект
        </a>
    </div>

    @if ($projects->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projects as $project)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-5 flex flex-col justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                            {{ $project->title }}
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-3">{{ $project->description }}</p>
                        <p class="text-sm text-gray-500">📅 Дедлайн: {{ $project->deadline ?? 'не указан' }}</p>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-3">
                        <a href="{{ route('projects.show', $project) }}"
                           class="text-blue-600 hover:text-blue-800 font-medium transition">Открыть</a>

                        <a href="{{ route('projects.edit', $project) }}"
                           class="text-yellow-500 hover:text-yellow-700 font-medium transition">Редактировать</a>

                        <form action="{{ route('projects.destroy', $project) }}" method="POST"
                              onsubmit="return confirm('Удалить проект?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-500 hover:text-red-700 font-medium transition">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 dark:text-gray-300">Проектов пока нет.</p>
    @endif
@endsection
