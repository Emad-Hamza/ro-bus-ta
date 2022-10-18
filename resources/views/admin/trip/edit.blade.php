@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.trip.actions.edit', ['name' => $trip->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <trip-form
                :action="'{{ $trip->resource_url }}'"
                :data="{{ $trip->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.trip.actions.edit', ['name' => $trip->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.trip.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </trip-form>

        </div>
    
</div>

@endsection