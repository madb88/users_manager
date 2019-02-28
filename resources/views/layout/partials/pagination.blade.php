<div class="container">
        <div class="row">
              <div class="col-8 d-flex justify-content-start">
                    {{trans('general.total')}} {{ $data->total() }}
              </div>
              <div class="col-4 d-flex justify-content-end">
                    {{ $data->render()}}
                </div>
        </div>
     </div>