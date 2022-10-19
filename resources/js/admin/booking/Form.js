import AppForm from '../app-components/Form/AppForm';

Vue.component('booking-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                trip_id:  '' ,
                user_id:  '' ,
                seat_id:  '' ,
                start_id:  '' ,
                destination_id:  '' ,
                
            }
        }
    }

});