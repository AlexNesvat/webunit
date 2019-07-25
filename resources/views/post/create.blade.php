@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Your posts</div>

                    <div class="card-body">
                        @if(Session::has('post_created'))
                            <div class="alert alert-success">
                                {{ Session::get('post_created') }}
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{--пост должен содержать заголовок, описание, автор, дата публикации, изображение--}}




                            <form action="{{action('PostController@store')}}" method="POST" enctype="multipart/form-data">
                            @csrf()
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="title">Post title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                           value="{{old('title')}}">
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
                                    <input id="date_of_publication" value="{{old('date_of_publication')}}"
                                           type="date" name="date_of_publication" class="form-control" autofocus>
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

                                    <label class="custom-file-label" for="postImage">Choose file</label>
                                    <input type="file" class="custom-file-input" id="postImage" name="post_image_file_name"
                                    value="{{old('post_image_file_name')}}">
                                    @if ($errors->has('post_image_file_name'))
                                        <span class="alert-danger" role="alert">
                                            @foreach($errors->get('post_image_file_name') as $message)
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
                                                  rows="3" value="{{old('description')}}"></textarea>
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
