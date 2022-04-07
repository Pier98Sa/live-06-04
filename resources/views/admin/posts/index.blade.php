@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-2">Crea un post</a>
                
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">contenuto</th>
                        <th scope="col">slug</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{substr($post->content,0,30)}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->category->name}}</td>
                            <td class="d-flex"> 
                                <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Show</a>
                                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-secondary mx-2">Edit</a>
                                
                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection