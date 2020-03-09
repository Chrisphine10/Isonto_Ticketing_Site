@extends('layouts.app')

@section('content')
<script
      src="https://code.jquery.com/jquery-3.2.1.js"
      integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
      crossorigin="anonymous">
   </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">{{ __('Users List') }}
                
                </div>
                <div class="card-body">
                    <div class="col-sm-12">

                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                    </div>

                    <table class="table table-condenced">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Current Role</th>
                                <th>Change Role</th>
                            </tr>
                            <thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar">
                                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                                @method('PATCH')
                                                @csrf
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    @if($user->role == "church")
                                                      <input type="radio" class="form-check-input" id="role" value="user" name="role" onclick="this.form.submit()">user
                                                    @else
                                                      <input type="radio" class="form-check-input" id="role" value="church" name="role" onclick="this.form.submit()">church
                                                    @endif
                                                    </label>
                                                  </div>
                                            </form>
                                        </div> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection