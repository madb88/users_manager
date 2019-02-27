@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
           <table class="table">
               <tbody>
                   <tr>
                       <td><h2>{{ trans('general.name')}}</h2></td>
                       <td><h1>{{ $role->name }}</h2></td>
                    </tr>
                    <tr>
                        <td><h2>{{trans('general.password_policy')}}</h2></td>
                        <td><h1>{{ $role->password_policy }}</h2></td>
                    </tr>
                </tbody>
           </table>
        </div>
     </div>
   </div>
@endsection
<b></b>

