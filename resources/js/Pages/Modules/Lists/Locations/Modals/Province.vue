<template>
    <b-modal v-model="showModal" title="New Province" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <div class="p-2">
            <form class="customform" @submit.prevent="submit">
                <div class="row g-3">
                    <div class="col-md-12 mb-n3">
                        <InputLabel for="name" value="Name" required="true"/>
                        <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div class="col-md-6">
                        <InputLabel for="region" value="Region"/>
                        <Multiselect :options="regions" v-model="form.region" :message="form.errors.region" placeholder="Select Region"/>
                    </div>
                     <div class="col-md-6">
                        <InputLabel for="old_name" value="Old name"/>
                        <TextInput id="old_name" v-model="form.old_name" type="text" class="form-control" autofocus placeholder="Please enter old name" autocomplete="old_name" required :class="{ 'is-invalid': form.errors.old_name }" />
                        <InputError :message="form.errors.old_name" />
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
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue'
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components : { InputError, InputLabel, TextInput, Multiselect },
    props: ['regions'],
    data(){
        return {
            showModal: false,
            form: useForm({
                code: null,
                name: null,
                old_name: null,
                region: null,
                type: 'province'
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
