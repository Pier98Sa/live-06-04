@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Visualizza post</h1>

                <div><strong>Tag: </strong>{{$tag->name}}</div>
                <div><strong>Slug: </strong>{{$tag->slug}}</div>
                <div>
                    <strong>Tags: </strong>
                    <ul>
                       @foreach ($tag->posts as $post)
                            <li >
                                <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
                            </li>
                        @endforeach 
                    </ul>
                    
                </div>
                


                <a href="{{route('admin.tag.index')}}" class="btn btn-primary">Ritorna alla lista</a>
            </div>
        </div>
    </div>
@endsection