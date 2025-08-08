@extends('UserLayout.admin_contain')

@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Add New Song</h3>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Song Details</h4>
                    <form method="POST" action="{{ route('checkSong') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Song Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Song Title">
                        </div>

                        <div class="form-group">
                            <label for="artist">Select Artist</label>
                            <select class="form-control" id="artist" name="artist_id">
                                <option value="">Select an Artist</option>
                                @foreach($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="album">Select Album (Optional)</label>
                            <select class="form-control" id="album" name="album_id">
                                <option value="">Select an Album</option>
                                @foreach($albums as $album)
                                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endforeach
                            </select>                            
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" name="genre" class="form-control" id="genre" placeholder="Enter Genre">
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration (in seconds)</label>
                            <input type="number" name="duration" class="form-control" id="duration"
                                placeholder="Enter Duration in Seconds">
                        </div>

                        <div class="form-group">
                            <label>Upload Cover Image</label>
                            <input type="file" name="cover_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Upload Song</label>
                            <input type="file" name="song_file" class="form-control" accept=".mp3,.m4a,.wav,.flac,.aac">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Song</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
