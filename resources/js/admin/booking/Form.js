import AppForm from '../app-components/Form/AppForm';

Vue.component('booking-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});