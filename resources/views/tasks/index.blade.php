@extends('layouts.app')
@section('content')
<h2 class="display-6 text-center mb-4">Tareas</h2>

<a href="/tasks/create" class="btn btn-outline-primary">Nueva Tarea</a>
<div class="table-responsive">
    <table class="table text-left">
        <thead>
            <tr>
                <th style="width: 5%">ID</th>
                <th style="width: 22%;">Nombre</th>
                <th style="width: 22%;">Prioridad</th>
                <th style="width: 22%;">Usuario</th>
                <th style="width: 22%;">Completada</th>
                <th style="width: 22%;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>

                    <th scope="row" class="text-start">{{ $task->id }}</th>
                    <th scope="row" class="text-start">
                        <a href="/tasks/{{ $task->id }}">{{ $task->name }}</a>
                    </th>
                    <td>
                        <span class="badge text-bg-warning">{{ $task->priority?->name }}</span>
                    </td>
                    <td>
                        <span> {{ $task->user?->name }}</span>
                    </td>
                    <td>
                        @if ($task->completed)
                            <svg class="bi" width="24" height="24">
                                <i class="fa-solid fa-check"></i>
                            </svg>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('tasks.complete', $task) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-primary">Marcar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>


    </table>
</div>
@endsection