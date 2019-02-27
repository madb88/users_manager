<div class="d-flex justify-content-end">
    {!! $roles->render() !!}
</div>
<table class="table">
        <thead>
           <tr>
               <th>{{trans('general.name')}}</th>
               <th>{{trans('general.created')}}</th>
               <th>{{trans('general.password_policy')}}</th>
               <th>{{trans('general.actions')}}</th>

           </tr>
        </thead>
         <tbody>
            @foreach($roles as $role)
            <tr id={{$role->id}}>
               <th>{{ $role->name}}</th>
               <th>{{ $role->created_at}}</th>
               <th>{{ $role->password_policy}}</th>


               <th>
                  <div class="btn-group" role="group" aria-label="user actions">
                     {!! Html::linkAction("RoleController@show", trans("general.view"), $role->id, array('title'=>trans('general.view'),'class'=>'btn btn-success','data-toggle'=>'tooltip','data-placement'=>'top')) !!}
                     {!! Html::linkAction("RoleController@edit", trans("general.edit"), $role->id, array('title'=>trans('general.edit'),'class'=>'btn btn-warning','data-toggle'=>'tooltip','data-placement'=>'top')) !!}
                     <button class="btn btn-danger delete-record" data-placement='top' data-route="roles" data-toggle="tooltip" title="{{trans('general.delete')}}" data-id="{{ $role->id }}" >{{trans('general.delete')}}</button>
                  </div>
               </th>
            </tr>
            @endforeach
         </tbody>
</table>

