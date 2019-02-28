@include('layout.partials.pagination', ['data' => $users])

<table class="table table-striped table-responsive-md">
   <thead>
      <tr>
         <th>{{trans('general.name')}}</th>
         <th>{{trans('general.surname')}}</th>
         <th>{{trans('general.email')}}</th>
         <th>{{trans('general.twitter_handle')}}</th>
         <th>{{trans('general.role')}}</th>
         <th>{{trans('general.created')}}</th>
         <th class="text-center">{{trans('general.actions')}}</th>
      </tr>
   </thead>
   <tbody>
      @foreach($users as $user)
      <tr id={{$user->id}}>
         <th>{{ $user->name }}</th>
         <th>{{ $user->surname }}</th>
         <th>{{ $user->email}}</th>
         <th>{{ $user->twitter_handle }}</th>
         <th>{{ !empty($roles[$user->role_id])?$roles[$user->role_id]: trans('general.no_role')}}</th>
         <th>{{ $user->created_at }}</th>

         <th>
            <div class="btn btn-group-justified text-center" role="group" aria-label="user actions">
               {!! Html::linkAction("UserController@show", trans("general.view"), $user->id, array('title'=>trans('general.view'),'class'=>'btn btn-success','data-placement'=>'top')) !!}
               {!! Html::linkAction("UserController@edit", trans("general.edit"), $user->id, array('title'=>trans('general.edit'),'class'=>'btn btn-info','data-placement'=>'top')) !!}
               <button class="btn btn-danger delete-record" data-placement='top' data-route="users" title="{{trans('general.delete')}}" data-id="{{ $user->id }}">{{trans('general.delete')}}</button>
            </div>
         </th>
      </tr>
      @endforeach
   </tbody>
</table>




