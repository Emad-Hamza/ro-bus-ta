<div class="form-group row align-items-center" :class="{'has-danger': errors.has('trip_id'), 'has-success': fields.trip_id && fields.trip_id.valid }">
    <label for="trip_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.trip_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.trip_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('trip_id'), 'form-control-success': fields.trip_id && fields.trip_id.valid}" id="trip_id" name="trip_id" placeholder="{{ trans('admin.booking.columns.trip_id') }}">
        <div v-if="errors.has('trip_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('trip_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.booking.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('seat_id'), 'has-success': fields.seat_id && fields.seat_id.valid }">
    <label for="seat_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.seat_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.seat_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('seat_id'), 'form-control-success': fields.seat_id && fields.seat_id.valid}" id="seat_id" name="seat_id" placeholder="{{ trans('admin.booking.columns.seat_id') }}">
        <div v-if="errors.has('seat_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('seat_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_id'), 'has-success': fields.start_id && fields.start_id.valid }">
    <label for="start_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.start_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.start_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('start_id'), 'form-control-success': fields.start_id && fields.start_id.valid}" id="start_id" name="start_id" placeholder="{{ trans('admin.booking.columns.start_id') }}">
        <div v-if="errors.has('start_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('destination_id'), 'has-success': fields.destination_id && fields.destination_id.valid }">
    <label for="destination_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.destination_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.destination_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('destination_id'), 'form-control-success': fields.destination_id && fields.destination_id.valid}" id="destination_id" name="destination_id" placeholder="{{ trans('admin.booking.columns.destination_id') }}">
        <div v-if="errors.has('destination_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('destination_id') }}</div>
    </div>
</div>


