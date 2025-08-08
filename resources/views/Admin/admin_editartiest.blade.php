@extends('UserLayout.admin_contain') <!-- Extend your admin layout -->

@section('main-content')
    <!-- partial -->
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic form elements</h4>
                        <p class="card-description"> Basic form elements </p>
                        <form method="post" class="forms-sample" action="{{ route("upddata", $a->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $a->name }}" class="form-control" id="name"
                                    placeholder="Enter Artist Name">
                            </div>
                            <!-- Bio -->
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <input type="text" name="bio" value="{{ $a->bio }}" class="form-control" id="name"
                                    placeholder="Enter Artist Bio">
                            </div>
                            <!-- Cover Image Upload -->
                            <div class="form-group">
                                <label>Upload Cover Image</label>
                                <input type="file" name="image" class="form-control">
                                @if ($a->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $a->image) }}" alt="Cover Image" width="100">
                                    </div>
                                @endif
                            </div>
                            <!-- Submit & Cancel Buttons -->
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection