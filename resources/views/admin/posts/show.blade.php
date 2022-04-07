@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Visualizza post</h1>

                <div><strong>Titolo</strong>{{$post->title}}</div>
                <div><strong>Contentuto</strong>{{$post->title}}</div>
                <div><strong>Titolo</strong>{{$post->title}}</div>


                <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Ritorna alal lista</a>
            </div>
        </div>
    </div>
@endsection