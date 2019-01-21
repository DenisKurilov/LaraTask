@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <!-- Отображение ошибок проверки ввода -->
                        @include('common.errors')
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Add new task</div>
                                <div class="card-body">
                                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}

                                    <!-- Имя задачи -->
                                        <div class="form-group">
                                            <label for="task" class="col-sm-3 control-label">Task:</label>

                                            <div class="col-sm-6">
                                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
                                            </div>
                                        </div>

                                        <!-- Кнопка добавления задачи -->
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fa fa-plus"></i> Add task
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>




                        <!-- Текущие задачи -->
                        @if (count($tasks) > 0)

                            <br>
                            <br>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Current tasks</div>
                                    <div class="card-body">
                                        <table class="table table-striped task-table">

                                            <!-- Заголовок таблицы -->
                                            <thead>
                                            <th>Task</th>
                                            <th>&nbsp;</th>
                                            </thead>

                                            <!-- Тело таблицы -->
                                            <tbody>
                                            @foreach ($tasks as $task)
                                                <tr>
                                                    <!-- Имя задачи -->
                                                    <td class="table-text">
                                                        <div>{{ $task->name }}</div>
                                                    </td>

                                                    <td>
                                                        <!-- TODO: Кнопка Удалить -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

