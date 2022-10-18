@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.stations-trip.actions.edit', ['name' => $stationsTrip->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <stations-trip-form
                :action="'{{ $stationsTrip->resource_url }}'"
                :data="{{ $stationsTrip->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.stations-trip.actions.edit', ['name' => $stationsTrip->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.stations-trip.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </stations-trip-form>

        </div>
    
</div>

@endsection