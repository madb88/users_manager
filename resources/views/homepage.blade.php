@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container center-block">
       <div class="row">
           <h1> {{ trans('general.dashboard') }}</h1>
            <table class="table table-bordered ">
               <thead>
                  <tr class="table-primary">
                     <th>
                        {{ trans('general.name')}}
                     </th>
                     <th>
                           {{ trans('general.number')}}
                        </th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        {{ trans('general.users')}}
                     </td>
                     <td>
                        {{$users}}
                     </td>
                  </tr>
                  <tr>
                        <td>
                           {{ trans('general.roles')}}
                        </td>
                        <td>
                           {{$roles}}
                        </td>
                     </tr>
               </tbody>
            </table>
           <div>
           </div>
        </div>
     </div>
   </div>
@endsection
<b></b>