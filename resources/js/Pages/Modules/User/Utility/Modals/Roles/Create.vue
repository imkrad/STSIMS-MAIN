<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" :title="(!editable) ? 'Create Role' : 'Edit Role   '" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <div>
                        <h6 class="mb-1">General Information</h6>
                        <p class="text-muted fs-11 mt-n1">A role defines the tasks and responsibilities allowed for a user.</p>
                    </div>
                    <div>
                        <BRow class="g-3">
                            
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                            <BCol lg="12" class="mt-1 mb-n3">
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter role name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                <InputError :message="form.errors.name" />
                            </BCol>
                            <BCol lg="12">
                                <InputLabel for="description" value="Description" />
                                <Textarea id="description" v-model="form.description" type="text" class="form-control" autofocus placeholder="Please enter description" autocomplete="description" required :class="{ 'is-invalid': form.errors.description }" style="background-color: #f5f6f7;"/>
                                <InputError :message="form.errors.description" />
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-0 mb-n3"/></BCol>
                        </BRow>
                    </div>    
                </BCol>
            </BRow>
        </form>
          <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import Textarea from '@/Shared/Components/Forms/Textarea.vue';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputError, InputLabel, TextInput, Textarea },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                name: null,
                description: null
            }),
            showModal: false,
            editable: false
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        edit(data){
            this.form.id = data.id
            this.form.name = data.name;
            this.form.description = data.description;
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(!this.editable){
                this.form.post('/utility/roles',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    },
                });
            }else{
                this.form.put('/utility/roles',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    },
                });
            }
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.form.reset();
            this.form.clearErrors();
            this.editable = false;
            this.showModal = false;
        }
    }
}
</script>