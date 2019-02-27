<div class="d-flex justify-content-end">
    {!! $users->render() !!}
</div>
<table class="table">
        <thead>
           <tr>
               <th>{{trans('general.name')}}</th>
               <th>{{trans('general.email')}}</th>
               <th>{{trans('general.twitter_handle')}}</th>
               <th>{{trans('general.role')}}</th>
               <th>{{trans('general.created')}}</th>
               <th>{{trans('general.actions')}}</th>
           </tr>
        </thead>
         <tbody>
            @foreach($users as $user)
            <tr id={{$user->id}}>
               <th>{{ $user->name}}</th>
               <th>{{ $user->email}}</th>
               <th>{{ $user->twitter_handle }}</th>
               <th>{{ $roles[$user->role_id] }}</th>
               <th>{{ $user->created_at }}</th>

               <th>
                  <div class="btn-group" role="group" aria-label="user actions">
                     {!! Html::linkAction("UserController@show", trans("general.view"), $user->id, array('title'=>trans('general.view'),'class'=>'btn btn-success','data-toggle'=>'tooltip','data-placement'=>'top')) !!}
                     {!! Html::linkAction("UserController@edit", trans("general.edit"), $user->id, array('title'=>trans('general.edit'),'class'=>'btn btn-warning','data-toggle'=>'tooltip','data-placement'=>'top')) !!}
                     <button class="btn btn-danger delete-record" data-placement='top' data-route="users" data-toggle="tooltip" title="{{trans('general.delete')}}" data-id="{{ $user->id }}" >{{trans('general.delete')}}</button>
                  </div>
               </th>
            </tr>
            @endforeach
         </tbody>
</table>

