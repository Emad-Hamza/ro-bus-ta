import AppForm from '../app-components/Form/AppForm';

Vue.component('station-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});