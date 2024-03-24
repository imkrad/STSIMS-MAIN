<template>
    <b-modal v-model="showModal" title="Confirm" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
       <div class="p-2 mt-2 text-center">
            <p class="font-size-12 text-muted"> Are you sure you want to save?</p>
            <p class="fw-semibold">To confirm, type "{{code}}" in the box below</p>
            <input type="text" v-model="confirmation" class="form-control mt-n3 text-center">
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button v-if="code == confirmation" @click="create('ok')" variant="primary" :disabled="form.processing" block>Save</b-button>
        </template>
    </b-modal>
</template>
<script>
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
export default {
    components: { Multiselect },
    props: ['dropdowns'],
    data(){
        return {
            currentUrl: window.location.origin,
            errors: [],
            user: {
                status: {},
                address: {
                    info: {}
                },
                profile: {},
            },
            form : {},
            code: '',
            confirmation: '',
            showModal: false,
        }
    },
    methods : {
        show(data){
            this.form = data;
            this.code = data.type+'-qualifier';
            this.showModal = true;
        },
        create(){
            this.form.post('/scholars/qualifiers',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.$emit('status',true);
                    this.hide();
                },
                onError: () => {
                    this.hide();
                }
            });
        },
        hide(){
            this.code = '';
            this.confirmation = '';
            this.showModal = false;
        }
    }
}
</script>