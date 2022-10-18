import AppForm from '../app-components/Form/AppForm';

Vue.component('seat-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                bus_id:  '' ,
                
            }
        }
    }

});