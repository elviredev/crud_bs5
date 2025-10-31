@extends('layouts.app')

@section('title', 'Students Details')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-white mb-3 mb-sm-0">Student Details</h1>
        <div class="card bg-dark text-white mt-4">
          <div class="card-body border border-success rounded">
            <h5 class="card-title"><strong>Name:</strong> {{ $student->name }} </h5>
            <p class="card-text"><strong>Email:</strong> {{ $student->email }} </p>
            <p class="card-text"><strong>Phone:</strong> {{ $student->phone }} </p>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to list</a>
          </div>
        </div>
      </div>
    </div>
@endsection

