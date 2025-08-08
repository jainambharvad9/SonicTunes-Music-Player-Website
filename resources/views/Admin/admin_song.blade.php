@extends('UserLayout.admin_contain')

@section('main-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Songs List</h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Songs</h4>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Artist</th>
                                        <th>Album</th>
                                        <th>Genre</th>
                                        <th>Cover</th>
                                        <th>Audio</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($songs as $song)
                                        <tr>
                                            <td>{{ $song->title }}</td>
                                            <td>{{ $song->artist->name }}</td>
                                            <td>
                                                {{ optional($song->album)->name ?? 'No Album' }}
                                            </td>                                            
                                            <td>{{ $song->genre }}</td>
                                            <td>
                                                @if ($song->cover_image)
                                                    <img src="{{ asset('storage/' . $song->cover_image) }}" width="80"
                                                        alt="Cover Image">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                @if ($song->song_file)
                                                    <audio controls>
                                                        <source src="{{ asset('storage/' . $song->song_file) }}" type="audio/mp4">
                                                        <source src="{{ asset('storage/' . $song->song_file) }}" type="audio/mpeg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                @else
                                                    No Song
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('updSong', $song->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('delSong', $song->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <a href="/Addsong" class="btn btn-primary mt-3">Add New Song</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection