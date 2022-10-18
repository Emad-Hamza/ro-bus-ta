<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bus_id'), 'has-success': fields.bus_id && fields.bus_id.valid }">
    <label for="bus_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.seat.columns.bus_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bus_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bus_id'), 'form-control-success': fields.bus_id && fields.bus_id.valid}" id="bus_id" name="bus_id" placeholder="{{ trans('admin.seat.columns.bus_id') }}">
        <div v-if="errors.has('bus_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bus_id') }}</div>
    </div>
</div>


