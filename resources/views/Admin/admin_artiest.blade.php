@extends('UserLayout.admin_contain') <!-- Extend your admin layout -->

@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Artist List </h3>
      {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
      </nav> --}}
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">All Artist</h4>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Bio</th>
                    <th>Artist Image</th>
                    <th>Action</th>                
                  </tr>
                </thead>
                <tbody>
                    @foreach ($ar as $a)
                    <tr>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->bio }}</td>
                        <td>
                          @if ($a->image)
                          <img src="{{ asset($a->image) }}" alt="Cover Image" width="100">
                          @else
                              No Image
                          @endif
                        </td>
                        <td colspan="2">
                          <a  href="{{route("upd",$a->id)}}" class="btn btn-info">Edit</a>
                            <a  href="{{route("del",$a->id)}}" class="btn btn-danger" 
                              onclick="return confirm('Are you sure you want to delete this Artist?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <a href="/AddArtiest" class="btn btn-primary mt-3">Add New Artist</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection