@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your posts</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @isset($posts)
                            @foreach($posts as $post)

                                <h1>{{$post['title']}}</h1>
                                <p>{{$post['description']}}</p>
                                <span>Published at {{$post['date_of_publication']}}</span>

                                    <img src="{{asset('storage/'.$post['post_image_file_name'])}}" alt="">
                            @endforeach
                        @else
                            you don't have any posts yet
                        @endisset


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
