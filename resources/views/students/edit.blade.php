@extends('layout.app')

@section('page-title', 'aggiungi studente')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>modifica informazioni studenti</h1>
        <a class="btn btn-secondary" href="{{route('students.index')}}">torna alla lista</a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('students.update', ['student' => $student->id])}}" method="post">
    @method('PUT')
    @csrf
        <div class="form-group">
            <label for="firstname-input">First name</label>
            <input type="text" class="form-control" id="firstname-input" name="first_name" value="{{old('first_name', $student->first_name)}}" required>
        </div>
        <div class="form-group">
            <label for="lastname-input">Last name</label>
            <input type="text" class="form-control" id="lastname-input" name="last_name" value="{{old('last_name', $student->last_name)}}" required>
        </div>
        <div class="form-group">
            <label for="student-id-input">Student ID #</label>
            <input type="text" class="form-control" id="student-id-input" name="student_id_nr" value="{{old('student_id_nr', $student->student_id_nr)}}" required>
        </div>
        <div class="form-group">
            <label for="email-input">Email address</label>
            <input type="email" class="form-control" id="email-input" name="email" value="{{old('email', $student->email)}}">
        </div>
          <button type="submit" class="btn btn-warning">modifica</button>
    </form>
    <form action="{{ route('students.destroy', ['student' => $student->id])}}" method="post">
        @method('DELETE')
        @csrf
        <input type="submit" class="btn btn-danger" value="elimina">
    </form>
</div>
@endsection
