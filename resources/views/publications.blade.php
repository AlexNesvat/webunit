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

                            <h2>{{$user[0]['name']}}</h2>
                            <h3>Registered {{$user[0]['created_at']}}</h3>
                            <h4>Registered {{$user[0]['birth_date']}}</h4>

                        @foreach($user[0]['posts'] as $post)
                                <h5>{{$post['title']}}</h5>
                                <p>{{$post['description']}}</p>
                                <span>Published at {{$post['date_of_publication']}}</span>

                                <img src="{{asset('storage/'.$post['post_image_file_name'])}}" alt="">
                        @endforeach

                            @auth()
                            <div class="row">
                                <div class="col-6">
                                    {{--@dd(auth()->user()->isFollowing($user[0]['id']))--}}
                                    @if (auth()->user()->isFollowing($user[0]['id']))
                                            <form action="{{route('unfollow', ['id' => $user[0]['id']])}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-follow-{{ $user[0]['id'] }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Unfollow
                                                </button>
                                            </form>

                                    @else

                                            <form action="{{route('follow', ['id' => $user[0]['id']])}}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" id="follow-user-{{ $user[0]['id'] }}" class="btn btn-success">
                                                    <i class="fa fa-btn fa-user"></i>Follow
                                                </button>
                                            </form>
                                    @endif
                                </div>
                            </div>
                            @endauth

                        @if($errors->any())

                            @foreach($errors as $error)
                                {{$message}}

                            @endforeach

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
