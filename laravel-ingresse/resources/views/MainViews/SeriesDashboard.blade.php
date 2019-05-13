@extends('Layouts.TemplateBladePage')

@section('title', 'Dashboard')

@section('styles')

@endsection

@section('content')

    <div class="container table-responsive">
        <table class="table-striped table-hover table-sm table-dark  table mt-5 align-center shadow">
        <thead class="thead-dark">
        <tr>
            <th class="text-center">Index</th>
            <th class="text-center">Name</th>
            <th class="text-center">Genres</th>
            <th class="text-center">Poster</th>
        </tr>
         </thead>
        <tbody>
            
            @for($i = 0; $i < 240; $i++)
            
            <tr>
                <td class="align-middle text-center">{{$i2 = $i + 1}}</td>
                <td class="align-middle text-center zoom"><a class="text-white " href="{{route('serie.route', $NameList[$i])}}" target="_blank"> {{$NameList[$i]}} </a></td>
                <td class="align-middle text-center">{{$GenresList[$i]}}</td>
                <td class="align-middle text-center"><a href="{{route('serie.route', $NameList[$i])}}" target="_blank"><img class="img-fluid rounded shadow zoom" src="{{asset($i2.'-poster.jpg')}}"></a></td>
            </tr>
            @endfor
        </tbody>
        </table>
    </div>

@endsection


@section('scripts')


@endsection
