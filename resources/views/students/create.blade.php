@extends('layout.app')

@section('page-title', 'aggiungi studenti')

@section('content')
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h1>aggiungi studenti</h1>
      <a class="btn btn-secondary" href="{{route('students.index')}}">torna alla lista</a>
    </div>
    <div class="js-errorbox alert alert-danger">

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
    <form action="{{route('students.store')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="firstname-input">First name</label>
        <input type="text" class="form-control" id="firstname-input" name="first_name" value="{{old('first_name')}}" {{-- required --}}>
        @error('first_name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="lastname-input">Last name</label>
        <input type="text" class="form-control" id="lastname-input" name="last_name" value="{{old('last_name')}}" {{-- required --}}>
        @error('last_name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="student-id-input">Student ID #</label>
        <input type="text" class="form-control" id="student-id-input" name="student_id_nr" value="{{old('student_id_nr')}}" {{-- required --}}>
        @error('student_id_nr')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="email-input">Email address</label>
        <input type="text" class="form-control" id="email-input" name="email" value="{{old('email')}}">
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="data-submit btn btn-primary">Crea</button>
    </form>
  </div>
@endsection
