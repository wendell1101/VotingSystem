@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons"><i class="fas fa-poll"></i></i>
          <!-- <i class="material-iconsfas fa-poll"></i> -->
        </div>
        <p class="card-category">Voter Turnouts</p>
        <h3 class="card-title">50 %
          <small></small>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-danger">warning</i>
          <a href="javascript:;">Get More Space...</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons"><i class="fas fa-close"> </i></i>
        </div>
        <p class="card-category">Revenue</p>
        <h3 class="card-title">$34,245</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">date_range</i> Last 24 Hours
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">info_outline</i>
        </div>
        <p class="card-category">Fixed Issues</p>
        <h3 class="card-title">75</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons">local_offer</i> Tracked from Github
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-light card-header-icon">
        <div class="card-icon">
          <i class="material-icons"><i class="fab fa-instagram"></i></i>
        </div>
        <p class="card-category">Followers</p>
        <h3 class="card-title">+245</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons"></i> Just Updated
        </div>
      </div>
    </div>
  </div>
</div>

@endsection