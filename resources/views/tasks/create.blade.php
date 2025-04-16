@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить задачу к проекту: {{ $project->title }}</h1>

    <form action="{{ route('projects.tasks.store', $project) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Название</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Описание</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Статус</label>
            <select name="status" class="form-control">
                <option value="pending">В ожидании</option>
                <option value="in_progress">В работе</option>
                <option value="done">Завершено</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Приоритет</label>
            <select name="priority" class="form-control">
                <option value="low">Низкий</option>
                <option value="medium" selected>Средний</option>
                <option value="high">Высокий</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Крайний срок</label>
            <input type="date" name="due_date" class="form-control">
        </div>

        <button class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection
