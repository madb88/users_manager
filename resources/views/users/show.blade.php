@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
           <table class="table">
               <tbody>
                    <img src="{{$user->gravatar}}">
                   <tr>
                       <td><h2>{{ trans('general.name')}}</h2></td>
                       <td><h1>{{ $user->name }}</h2></td>
                    </tr>
                    <tr>
                        <td><h2>{{trans('general.email')}}</h2></td>
                        <td><h1>{{ $user->email }}</h2></td>
                    </tr>
                    <tr>
                        <td><h2>{{trans('general.created')}}</h2></td>
                        <td><h1>{{ $user->created_at }}</h2></td>
                    </tr>
                    <tr>
                        <td><h2>{{trans('general.role')}}</h2></td>
                        <td><h1>{{ $user->role->name }}</h2></td>
                    </tr>
                </tbody>
           </table>
           <div class="col-md-12">
            @if(!empty($user->twitter_handle))
                {!! $user->twitter !!}
            @endif
           </div>
        </div>
     </div>
   </div>
@endsection
<b></b>

