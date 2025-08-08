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
                        <form method="POST" class="forms-sample" action="{{ route('updadata', $alb->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $alb->name }}" placeholder="Enter Album Name">
                            </div>
                        
                            <!-- Artist Selection -->
                            <div class="form-group">
                                <label for="artist">Select Artist</label>
                                <select class="form-control" id="artist" name="artist_id">
                                    <option value="">Select an Artist</option>
                                    @foreach($artists as $artist)
                                        <option value="{{ $artist->id }}" {{ $alb->artist_id == $artist->id ? 'selected' : '' }}>{{ $artist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <!-- Release Date -->
                            <div class="form-group">
                                <label for="release_date">Release Date</label>
                                <input type="date" name="release_date" class="form-control" id="release_date" value="{{ $alb->release_date }}">
                            </div>
                        
                            <!-- Cover Image Upload -->
                            <div class="form-group">
                                <label>Upload Cover Image</label>
                                <input type="file" name="cover_image" class="form-control">
                                @if ($alb->cover_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $alb->cover_image) }}" alt="Cover Image" width="100">
                                    </div>
                                @endif
                            </div>
                        
                            <!-- Submit & Cancel Buttons -->
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <button type="reset" class="btn btn-dark">Cancel</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection