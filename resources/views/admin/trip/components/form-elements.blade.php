<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bus_id'), 'has-success': fields.bus_id && fields.bus_id.valid }">
    <label for="bus_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.trip.columns.bus_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bus_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bus_id'), 'form-control-success': fields.bus_id && fields.bus_id.valid}" id="bus_id" name="bus_id" placeholder="{{ trans('admin.trip.columns.bus_id') }}">
        <div v-if="errors.has('bus_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bus_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('destination_id'), 'has-success': fields.destination_id && fields.destination_id.valid }">
    <label for="destination_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.trip.columns.destination_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.destination_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('destination_id'), 'form-control-success': fields.destination_id && fields.destination_id.valid}" id="destination_id" name="destination_id" placeholder="{{ trans('admin.trip.columns.destination_id') }}">
        <div v-if="errors.has('destination_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('destination_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('parent_trip_id'), 'has-success': fields.parent_trip_id && fields.parent_trip_id.valid }">
    <label for="parent_trip_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.trip.columns.parent_trip_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.parent_trip_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('parent_trip_id'), 'form-control-success': fields.parent_trip_id && fields.parent_trip_id.valid}" id="parent_trip_id" name="parent_trip_id" placeholder="{{ trans('admin.trip.columns.parent_trip_id') }}">
        <div v-if="errors.has('parent_trip_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('parent_trip_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_id'), 'has-success': fields.start_id && fields.start_id.valid }">
    <label for="start_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.trip.columns.start_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.start_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('start_id'), 'form-control-success': fields.start_id && fields.start_id.valid}" id="start_id" name="start_id" placeholder="{{ trans('admin.trip.columns.start_id') }}">
        <div v-if="errors.has('start_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_id') }}</div>
    </div>
</div>


