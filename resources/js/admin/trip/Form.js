import AppForm from '../app-components/Form/AppForm';

Vue.component('trip-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                bus_id:  '' ,
                destination_id:  '' ,
                parent_trip_id:  '' ,
                start_id:  '' ,
                
            }
        }
    }

});