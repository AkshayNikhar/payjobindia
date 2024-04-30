@extends('themes::default.layout')
@section('content')
@include('themes::default.nav')

<!-- START PRICING -->
    <section class="section-sm p-5" style="background:url({{url('/modules/themes/default/images/banner-small.jpeg')}});">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box text-center">
                        <h3 class="title-heading mt-4 text-white">{{$page->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mb-5">
            <div class="row mt-5 pt-4 text-center">
                {!!$page->description!!}
            </div>
    </div>

@stop