
@include('layout.partials.pagination', ['data'=>$roles])
<table class="table table-striped table-responsive-md">
   <thead>
      <tr>
         <th>{{trans('general.name')}}</th>
         <th>{{trans('general.created')}}</th>
         <th>{{trans('general.password_policy')}}</th>
         <th class="text-center">{{trans('general.actions')}}</th>
      </tr>
   </thead>
   <tbody>
      @foreach($roles as $role)
      <tr id={{$role->id}}>
         <th>{{ $role->name}}</th>
         <th>{{ $role->created_at}}</th>
         <th>{{ $role->password_policy}}</th>
         <th>
            <div class="btn btn-group-justified text-center" role="group" aria-label="user actions">
               {!! Html::linkAction("RoleController@show", trans("general.view"), $role->id, array('title'=>trans('general.view'),'class'=>'btn btn-success','data-placement'=>'top')) !!}
               {!! Html::linkAction("RoleController@edit", trans("general.edit"), $role->id, array('title'=>trans('general.edit'),'class'=>'btn btn-info','data-placement'=>'top')) !!}
               <button class="btn btn-danger delete-record" data-placement='top' data-route="roles" title="{{trans('general.delete')}}" data-id="{{ $role->id }}" >{{trans('general.delete')}}</button>
            </div>
         </th>
      </tr>
      @endforeach
   </tbody>
</table>



