@extends('Layouts.TemplateBladePage')

@section('title', 'Details')

@section('styles')

@endsection

@section('content')

    <div class="container">
        <div class="text-center mt-5 mb-5"><img class="img-fluid img rounded shadow zoom" src="{{asset('OriginalPoster.jpg')}}"></div>
        <div class="row text-center datafont">
        <div class="col-sm rounded bg1 ml-2 mr-2 mt-2 shadow text-white zoom"><b class="blue">Title: </b>{{$SingleShowDetails->name}}</div>
        <div class="col-sm rounded bg1 ml-2 mr-2 mt-2 shadow text-white zoom"><b class="blue">Genre: </b>{{$SingleShowDetails->genres[0]}}</div>
        <div class="col-sm rounded bg1 ml-2 mr-2 mt-2 shadow text-white zoom"><b class="blue">Premiered: </b>{{$SingleShowDetails->premiered}}</div>
        </div>
        <div class="text-justify mt-4 mb-5 datafont shadow bg1 rounded p-4 text-white zoom">{{strip_tags($SingleShowDetails->summary)}}</div>
    </div>

@endsection


@section('scripts')


@endsection
