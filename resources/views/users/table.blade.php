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
                  {!! Html::linkAction("UserController@show", trans("users.view"), $user->id, array('class'=>'btn btn-success')) !!}
                  {!! Html::linkAction("UserController@edit", trans("users.edit"), $user->id, array('class'=>'btn btn-primary')) !!}
                  <button class="btn btn-danger delete-user" data-id="{{ $user->id }}" >{{trans('users.delete')}}</button>
               </th>
            </tr>
            @endforeach
         </tbody>
</table>
 
