import AppForm from '../app-components/Form/AppForm';

Vue.component('bus-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});