@extends('layouts.app')

@section('title', 'To Do List')


@section('content')
    <!-- Main Content -->
    <div class="container min-vh-100 py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <!-- Add Tasks -->
                    <div class="container p-4">
                        <div class="text-center title-text">
                            <h3 class="text-title py-4">Catat Tugasmu!</h3>
                        </div>
                        <form class="d-flex" action="{{ route('task.store') }}" method="POST">
                            @csrf
                            <input class="form-control rounded-0" name="tasks" type="text" placeholder="Tambah Tugas"
                                aria-label="Tambah Tugas">
                            <button class="btn btn-outline-dark rounded-0" type="submit">Tambah</button>
                        </form>
                    </div>
                    <!-- List Tasks -->
                    <div class="container mt-4">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>No.</th>
                                    <th>Tasks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($task as $task)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $task->tasks }}</td>
                                        <th class=" text-center">
                                            <a href="#" class="btn border">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <form action="{{ route('task.destroy', $task->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="Submit" class="btn border">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="3" class="text-center fst-italic">Data Kosong..</th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
