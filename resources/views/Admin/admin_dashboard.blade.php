@extends("UserLayout.admin_contain")

@section("main-content")

<div class="content-wrapper">

<div class="row">
    <!-- Total Music -->
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card" style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: white;">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h1 class="mb-0">{{$totalMusic}}</h1>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-music-note icon-item" style="font-size: 36px; color: #FFD700;"></span>
                        </div>
                    </div>
                </div>
                <h4 class="font-weight-normal mt-2">Total Music</h4>
            </div>
        </div>
    </div>

    <!-- Total Albums -->
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card" style="background: linear-gradient(135deg, #ff7e5f, #feb47b); color: white;">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h1 class="mb-0">{{$totalAlbums}}</h1>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-album icon-item" style="font-size: 36px; color: #00FF00;"></span>
                        </div>
                    </div>
                </div>
                <h4 class="font-weight-normal mt-2">Total Albums</h4>
            </div>
        </div>
    </div>

    <!-- Total Artists -->
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card" style="background: linear-gradient(135deg, #43cea2, #185a9d); color: white;">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h1 class="mb-0">{{$totalArtists}}</h1>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-account-music icon-item" style="font-size: 36px; color: #FF4500;"></span>
                        </div>
                    </div>
                </div>
                <h4 class="font-weight-normal mt-2">Total Artists</h4>
            </div>
        </div>
    </div>

    <!-- Total Users -->
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card" style="background: linear-gradient(135deg, #ff512f, #dd2476); color: white;">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h1 class="mb-0">{{$totalUsers}}</h1>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-account-group icon-item" style="font-size: 36px; color: #1E90FF;"></span>
                        </div>
                    </div>
                </div>
                <h4 class="font-weight-normal mt-2">Total Users</h4>
            </div>
        </div>
    </div>
</div>
  <div class="row">
    <!-- <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Transaction History</h4>
          <div class="position-relative">
            <div class="daoughnutchart-wrapper">
              <canvas id="transaction-history" class="transaction-chart"></canvas>
            </div>
            <div class="custom-value">$1200 <span>Total</span>
            </div>
          </div>
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Transfer to Paypal</h6>
              <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
            </div>
            <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
              <h6 class="font-weight-bold mb-0">$236</h6>
            </div>
          </div>
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Tranfer to Stripe</h6>
              <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
            </div>
            <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
              <h6 class="font-weight-bold mb-0">$593</h6>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    
    
    <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title mb-1">Upcoming Music Trends</h4>
                <p class="text-muted mb-1">Stay ahead with insights</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="preview-list">
                        <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-primary">
                                    <i class="mdi mdi-music-note"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                    <h6 class="preview-subject">AI-Generated Music</h6>
                                    <p class="text-muted mb-0">Explore the rise of AI in music creation</p>
                                </div>
                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                    <p class="text-muted">2 days ago</p>
                                    <p class="text-muted mb-0">Trending globally</p>
                                </div>
                            </div>
                        </div>
                        <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-headphones"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                    <h6 class="preview-subject">Upcoming Album Releases</h6>
                                    <p class="text-muted mb-0">Top artists releasing new albums</p>
                                </div>
                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                    <p class="text-muted">1 week ago</p>
                                    <p class="text-muted mb-0">15 albums scheduled</p>
                                </div>
                            </div>
                        </div>
                        <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-chart-line"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                    <h6 class="preview-subject">Streaming Analytics</h6>
                                    <p class="text-muted mb-0">Track the most streamed songs</p>
                                </div>
                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                    <p class="text-muted">3 hours ago</p>
                                    <p class="text-muted mb-0">Updated hourly</p>
                                </div>
                            </div>
                        </div>
                        <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-danger">
                                    <i class="mdi mdi-microphone"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                    <h6 class="preview-subject">Live Concerts</h6>
                                    <p class="text-muted mb-0">Upcoming virtual and in-person events</p>
                                </div>
                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                    <p class="text-muted">5 days ago</p>
                                    <p class="text-muted mb-0">20+ events listed</p>
                                </div>
                            </div>
                        </div>
                        <div class="preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-star"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                    <h6 class="preview-subject">Rising Artists</h6>
                                    <p class="text-muted mb-0">Discover the next big stars</p>
                                </div>
                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                    <p class="text-muted">1 day ago</p>
                                    <p class="text-muted mb-0">10 artists featured</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
  <div class="row">
    <!-- Upcoming Music Application -->
    <div class="col-sm-4 grid-margin">
        <div class="card" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <div class="card-body">
                <h5>Upcoming Music App</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">v2.5</h2>
                            <p class="text-success ms-2 mb-0 font-weight-medium">New Features</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">Release Date: 15 May 2025</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-update text-primary ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Music Artists -->
    <div class="col-sm-4 grid-margin">
        <div class="card" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <div class="card-body">
                <h5>Top Music Artists</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">50+</h2>
                            <p class="text-success ms-2 mb-0 font-weight-medium">Featured</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">Updated Weekly</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-account-music text-danger ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Concerts -->
    <div class="col-sm-4 grid-margin">
        <div class="card" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <div class="card-body">
                <h5>Upcoming Concerts</h5>
                <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                            <h2 class="mb-0">20+</h2>
                            <p class="text-success ms-2 mb-0 font-weight-medium">Events</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">Virtual & In-Person</h6>
                    </div>
                    <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-microphone text-success ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection