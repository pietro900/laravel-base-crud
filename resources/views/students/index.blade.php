@extends('layout.app')

@section('page-title', 'Alunni')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mt-3 mb-3">lista Alunni</h1>
                    <a class="btn btn-primary" href="{{ route('students.create') }}">nuovo alunno</a>
                </div>

                <table class="table">
                    <tr>
                        <th>Student ID #</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                    </tr>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->student_id_nr }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('students.show', ['student' => $student->id]) }}">Dettagli</a>

                                    <a class="btn btn-warning" href="{{ route('students.edit', ['student' => $student->id]) }}">modifica</a>

                                    <form action="{{ route('students.destroy', ['student' => $student->id])}}"   method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="elimina">
                                    </form>
                                </td>
                            </tr>
                            @empty
                        <tr colspan='4'>
                            <td>non è presente nessun studente</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
