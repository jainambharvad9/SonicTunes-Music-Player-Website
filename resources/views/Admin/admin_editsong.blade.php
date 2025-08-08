@extends('UserLayout.admin_contain')

@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Song</h3>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Song Details</h4>
                    <form method="POST" action="{{ route('upddataSong', $song->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Song Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $song->title }}">
                        </div>

                        <div class="form-group">
                            <label for="artist">Select Artist</label>
                            <select class="form-control" id="artist" name="artist_id">
                                @foreach($artists as $artist)
                                    <option value="{{ $artist->id }}" {{ $song->artist_id == $artist->id ? 'selected' : '' }}>
                                        {{ $artist->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="album">Select Album (Optional)</label>
                            <select class="form-control" id="album" name="album_id">
                                @foreach($albums as $album)
                                    <option value="{{ $album->id }}" {{ $song->album_id == $album->id ? 'selected' : '' }}>
                                        {{ $album->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" name="genre" class="form-control" id="genre" value="{{ $song->genre }}" placeholder="Enter Genre">
                        </div>


                        <div class="form-group">
                            <label>Current Cover Image</label><br>
                            @if ($song->cover_image)
                                <img src="{{ asset('storage/' . $song->cover_image) }}" width="100">
                            @endif
                            <input type="file" name="cover_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Upload New Song</label>
                            <input type="file" name="song_file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Song</button>
                        <a href="{{ route('ViewSong') }}" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
