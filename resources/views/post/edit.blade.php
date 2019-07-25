@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Your posts</div>

                    <div class="card-body">

                        @if(Session::has('post_updated'))
                            <div class="alert alert-success">
                                {{ Session::get('post_updated') }}
                            </div>
                        @endif


                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{--пост должен содержать заголовок, описание, автор, дата публикации, изображение--}}

                        <form action="{{action('PostController@update')}}" method="POST" enctype="multipart/form-data">
                            @csrf()
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="title">Post title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                           value="">
                                    @if ($errors->has('title'))
                                        <span class="alert-danger" role="alert">
                                            @foreach($errors->get('title') as $message)
                                                <strong>{{$message}}</strong>
                                            @endforeach
                                       </span>
                                    @else
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-row">
                                <label for="date_of_publication"
                                       class="col-md-2 col-form-label text-md-left">{{ __('Date of publication') }}</label>

                                <div class="col-md-3">
                                    <input id="date_of_publication" type="date" name="date_of_publication" class="form-control" autofocus>
                                    @if ($errors->has('date_of_publication'))
                                        <span class="alert-danger" role="alert">
                                            @foreach($errors->get('date_of_publication') as $message)
                                                <strong>{{$message}}</strong>
                                            @endforeach
                                       </span>
                                    @else
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-4">

                                    @if($post)
                                        <img src="" alt="" class="img-responsive">
                                    @endif
                                    <label class="custom-file-label" for="postImage">Choose file</label>
                                    <input type="file" class="custom-file-input" id="postImage" name="image">
                                    @if ($errors->has('image'))
                                            <span class="alert-danger" role="alert">
                                            @foreach($errors->get('image') as $message)
                                                    <strong>{{$message}}</strong>
                                                @endforeach
                                            </span>
                                    @else
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    @endif
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="postDescription">Post description</label>
                                        <textarea class="form-control" id="postDescription" name="description"
                                                  rows="3"></textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="alert-danger" role="alert">
                                            @foreach($errors->get('description') as $message)
                                                <strong>{{$message}}</strong>
                                            @endforeach
                                       </span>
                                    @else
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    @endif

                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
