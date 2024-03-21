<template>
    <b-modal v-model="showModal" title="New Region" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <div class="p-2">
            <form class="customform" @submit.prevent="submit">
                <div class="row g-3">
                    <div class="col-md-12 mb-n3">
                        <InputLabel for="name" value="Name" required="true"/>
                        <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div class="col-md-6">
                        <InputLabel for="region" value="Region" :message="form.errors.region"/>
                        <TextInput id="name" v-model="form.region" type="text" class="form-control" autofocus placeholder="Please enter region" autocomplete="region" required :class="{ 'is-invalid': form.errors.region }" />
                        <InputError :message="form.errors.region" />
                    </div>
                     <div class="col-md-6">
                        <InputLabel for="island" value="Island"/>
                        <TextInput id="name" v-model="form.island" type="text" class="form-control" autofocus placeholder="Please enter island" autocomplete="island" required :class="{ 'is-invalid': form.errors.island }" />
                        <InputError :message="form.errors.island" />
                    </div>
                </div>
            </form>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="create('ok')" variant="primary" :disabled="form.processing" block><i class="ri-save-3-line align-bottom me-1"></i> Save</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components : { InputError, InputLabel, TextInput },
    data(){
        return {
            showModal: false,
            form: useForm({
                region: null,
                name: null,
                island: null,
                type: 'region'
            }),
        }
    },
    methods : {
        show() {
            this.showModal = true;
        },
        create(){
            this.form.post('/lists/locations',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.hide();
                },
            });
        },
        hide(){
            this.showModal = false;
        },
    }
}
</script>
