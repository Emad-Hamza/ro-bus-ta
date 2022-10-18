import AppForm from '../app-components/Form/AppForm';

Vue.component('stations-trip-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                trip_id:  '' ,
                station_id:  '' ,
                station_order:  '' ,
                
            }
        }
    }

});