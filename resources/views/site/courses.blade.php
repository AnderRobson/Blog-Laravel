@extends('site.layouts.layout')

@section('content')
    <div class="container">
        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        @foreach($publications as $publication)
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">{{$publication->title}}</h2>
                    <p class="lead">{{substr($publication->description, 0, 300)}}</p>
                </div>
                <div class="col-md-5">
                    {{--                        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>--}}
                    <img src="{{asset('upload/publication') . '/' . $publication->image}}" alt="{{$publication->title}}" width="500" height="500">
                </div>
            </div>

            <hr class="featurette-divider">
        @endforeach

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
@endsection
