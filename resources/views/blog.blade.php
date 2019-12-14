@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Blog</div>




                    <div id="app"></div>



                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @isset($posts)
                            @foreach($posts as $post)
                                <div class="align-content-center">
                                    <h1>{{$post['title']}}</h1>
                                    <p>{{$post['description']}}</p>
                                    <span>Published at {{$post['date_of_publication']}} by <a href="{{route('publications',['user'=>$post['user']['id']])}}">{{$post['user']['name']}}</a></span>

                                    <img src="{{asset('storage/'.$post['post_image_file_name'])}}" alt="">
                                </div>
                                    <hr/>
                            @endforeach

                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
