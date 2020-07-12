@extends('layout.app')

@section('page-title', 'student details')

@section('content')
<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center">
    <h1>Student: {{$student->student_id_nr}}</h1>
    <a class="btn btn-secondary" href="{{route('students.index')}}">torna alla lista</a>
  </div>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Student ID #</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
          <tr>
            <th>{{$student->student_id_nr}}</th>
            <th>{{$student->first_name}}</th>
            <th>{{$student->last_name}}</th>
            <th>{{$student->email}}</th>
          </tr>
    </tbody>
  </table>
  {{-- <a class="btn btn-warning" href="{{route('students.edit', ['student' => $student->id])}}">Edit</a>
  <a class="btn btn-danger" href="{{route('students.deletepreview', ['student' => $student->id])}}">Delete</a> --}}
</div>
@endsection
