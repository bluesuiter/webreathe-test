@extends('layouts.app')

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
            <!-- Reports -->
            @include('partials.home.reports')
        </div>

        <!-- Right side columns -->
        <div class="col-lg-4">
            <!-- Recent Activity -->
            @include('partials.home.recent-activity', ['moduleActivity' => $moduleActivity])
        </div>
        <!-- Top Sales -->
    </div><!-- End Reports -->
</section>
@endsection