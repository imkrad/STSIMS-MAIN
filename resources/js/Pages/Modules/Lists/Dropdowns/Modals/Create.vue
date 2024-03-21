<template>
    <b-modal v-model="showModal" title="Create Dropdown" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <div class="p-2">
            <form class="customform" @submit.prevent="submit">
                <div class="row g-3">
                    <div class="col-md-12 mb-n2">
                        <InputLabel for="name" value="Name" required="true"/>
                        <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div class="col-md-6 mb-n2">
                        <InputLabel for="classification" value="Classification"/>
                        <Multiselect :options="dropdowns" v-model="form.classification" :message="form.errors.classification" placeholder="Select Classification"/>
                    </div>
                     <div class="col-md-6 mb-n2">
                        <InputLabel for="type" value="Type"/>
                        <TextInput id="type" v-model="form.type" type="text" class="form-control" autofocus placeholder="Please enter type" autocomplete="type" required :class="{ 'is-invalid': form.errors.type }" />
                        <InputError :message="form.errors.type" />
                    </div>
                    <div class="col-md-6">
                        <InputLabel for="others" value="Others"/>
                        <TextInput id="others" v-model="form.others" type="text" class="form-control" autofocus placeholder="Please enter others" autocomplete="others" required :class="{ 'is-invalid': form.errors.others }" />
                        <InputError :message="form.errors.others" />
                    </div>
                    <div class="col-md-6">
                        <InputLabel for="color" value="Color"/>
                        <TextInput id="color" v-model="form.color" type="text" class="form-control" autofocus placeholder="Please enter color" autocomplete="color" required :class="{ 'is-invalid': form.errors.color }" />
                        <InputError :message="form.errors.color" />
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
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue';
export default {
    props: ['dropdowns'],
    components : { InputError, InputLabel, TextInput, Multiselect },
    data(){
        return {
            showModal: false,
            form: useForm({
                name: null,
                classification: null,
                type: null,
                others: null,
                color: null
            }),
        }
    },
    methods : {
        show() {
            this.showModal = true;
        },
        create(){
            this.form.post('/lists/dropdowns',{
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
