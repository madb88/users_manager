@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
           <table class="table">
               <tbody>
                    <img src="{{$user->gravatar}}">
                   <tr>
                       <td><h2>{{ trans('users.name')}}</h2></td>
                       <td><h1>{{ $user->name }}</h2></td>
                    </tr>
                    <tr>
                        <td><h2>{{trans('users.email')}}</h2></td>
                        <td><h1>{{ $user->email }}</h2></td>
                    </tr>
                    <tr>
                        <td><h2>{{trans('users.created_at')}}</h2></td>
                        <td><h1>{{ $user->created_at }}</h2></td>
                    </tr>
                    <tr>
                        <td><h2>{{trans('users.role')}}</h2></td>
                        <td><h1>{{ $user->role->name }}</h2></td>
                    </tr>
                </tbody>
           </table>
        </div>
     </div>
   </div>
@endsection
<b></b>