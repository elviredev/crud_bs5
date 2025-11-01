@extends('layouts.app')

@section('title', 'Students List')

@section('content')
  <div class="container mt-4">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-3">
      <h2 class="text-white mb-3 mb-sm-0">Students List</h2>
      <a href="{{ route('students.create') }}" class="btn btn-outline-info">Add Student</a>
    </div>

    <!-- message flash -->
    @session('success')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ $value }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Clode"></button>
    </div>
    @endsession

    <!--Tableau -->
    <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
      <table class="table table-striped table-bordered table-dark align-middle mb-0">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>

        @forelse ($students as $student)
          <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td class="text-center">
              <div class="d-flex flex-wrap justify-content-center gap-2">
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-warning btn-sm">View</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-info btn-sm">Edit</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-danger btn-sm delete-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteStudentModal"
                        data-route="{{ route('students.destroy', $student->id) }}"
                >Delete</button>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center">No student found!</td>
          </tr>
        @endforelse

        </tbody>
      </table>

      <!--Pagination -->
      <div class="d-flex justify-content-end mt-4">
        {{ $students->links('vendor.pagination.bootstrap-5-dark') }}
      </div>
    </div>
  </div>

  <!--Delete modal -->
  <div class="modal fade" id="deleteStudentModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header border-0">
          <h1 class="modal-title">Delete Student ?</h1>
          <button type="button" class="btn-close btn-close-white"
            data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>You're about to delete this student.</p>
          <p>This action cannot be reversed.</p>
        </div>
        <div class="modal-footer boder-0">
          <button type="button" class="btn btn-outline-light"
            data-bs-dismiss="modal">Cancel</button>

          <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button
              type="submit"
              class="btn btn-outline-danger"
            >Delete Student</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const deleteButtons = document.querySelectorAll('.delete-btn');
      const deleteForm = document.getElementById('deleteForm');

      deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
          const deleteUrl = this.dataset.route;
          deleteForm.action = deleteUrl;
        });
      });
    })
  </script>
@endsection

