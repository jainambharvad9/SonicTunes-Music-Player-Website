@extends('UserLayout.admin_contain')

@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Albums List</h3>
      {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Albums</li>
        </ol>
      </nav> --}}
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">All Albums</h4>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Cover Image</th>
                    <th>Artist</th>
                    <th>Release Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($al as $a)
                    <tr>
                        <td>{{ $a->name }}</td>
                        <td>
                          @if ($a->cover_image)
                              <img src="{{ asset('storage/' . $a->cover_image) }}" alt="Cover Image" width="100">
                          @else
                              No Image
                          @endif
                        </td>
                        <td>{{ $a->artist->name ?? 'Unknown Artist' }}</td>
                        <td>{{ $a->release_date }}</td>
                        <td>
                          <a href="{{ route('upda', $a->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('delet', $a->id) }}" class="btn btn-danger"
                              onclick="return confirm('Are you sure you want to delete this Album?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <a href="/AddAlbums" class="btn btn-primary mt-3">Add New Albums</a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
