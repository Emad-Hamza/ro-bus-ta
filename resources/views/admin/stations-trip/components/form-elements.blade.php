<div class="form-group row align-items-center" :class="{'has-danger': errors.has('trip_id'), 'has-success': fields.trip_id && fields.trip_id.valid }">
    <label for="trip_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stations-trip.columns.trip_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.trip_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('trip_id'), 'form-control-success': fields.trip_id && fields.trip_id.valid}" id="trip_id" name="trip_id" placeholder="{{ trans('admin.stations-trip.columns.trip_id') }}">
        <div v-if="errors.has('trip_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('trip_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('station_id'), 'has-success': fields.station_id && fields.station_id.valid }">
    <label for="station_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stations-trip.columns.station_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.station_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('station_id'), 'form-control-success': fields.station_id && fields.station_id.valid}" id="station_id" name="station_id" placeholder="{{ trans('admin.stations-trip.columns.station_id') }}">
        <div v-if="errors.has('station_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('station_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('station_order'), 'has-success': fields.station_order && fields.station_order.valid }">
    <label for="station_order" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.stations-trip.columns.station_order') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.station_order" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('station_order'), 'form-control-success': fields.station_order && fields.station_order.valid}" id="station_order" name="station_order" placeholder="{{ trans('admin.stations-trip.columns.station_order') }}">
        <div v-if="errors.has('station_order')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('station_order') }}</div>
    </div>
</div>


