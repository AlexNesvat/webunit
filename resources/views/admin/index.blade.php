@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Admin dashboard</div>

                    <div class="card-body">
                        @if(Session::has('user_deleted'))
                            <div class="alert alert-success">
                                {{ Session::get('user_deleted') }}
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <h3>Registered users</h3>


                        @isset($users)

                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Birth Date</th>
                                    <th scope="col">Posts count</th>
                                    <th scope="col">Registered</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user['id']}}</td>
                                        <td>{{$user['name']}}</td>
                                        <td>{{$user['email']}}</td>
                                        <td>{{$user['birth_date']}}</td>
                                        <td>{{count($user['posts'])}}</td>
                                        <td>{{$user['created_at']}}</td>
                                        <td>
                                            <form method="POST" action="/admin/delete-user/{{$user['id']}}">
                                                @csrf()
                                                @method('DELETE')

                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-danger delete-user"
                                                           value="Delete user">
                                                </div>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @endisset


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function () {

            $('.delete-user').click(function (e) {
                e.preventDefault() // Don't post the form, unless confirmed
                if (confirm('Are you sure?')) {
                    // Post the form
                    $(e.target).closest('form').submit() // Post the surrounding form
                }
            });
        });
    </script>
@endsection
