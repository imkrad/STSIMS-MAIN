<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" :title="(!editable) ? 'Create Course' : 'Edit Course'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <div>
                        <h6 class="mb-1">General Information</h6>
                        <p class="text-muted fs-11 mt-n1">A structured program of study offered by an educational institution.</p>
                    </div>
                    <div>
                        <BRow class="g-3">
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                            <BCol lg="12" class="mt-1 mb-n1">
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter role name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true"/>
                                <InputError :message="form.errors.name" />
                            </BCol>
                            <BCol lg="12" class="mt-1 mb-n1">
                                <InputLabel for="shortcut" value="Shortcut" />
                                <TextInput id="shortcut" v-model="form.shortcut" type="text" class="form-control" autofocus placeholder="Please enter shortcut" autocomplete="shortcut" required :class="{ 'is-invalid': form.errors.shortcut }" @input="handleInput('shortcut')" :light="true" />
                                <InputError :message="form.errors.shortcut" />
                            </BCol>
                            <BCol lg="6" class="mt-1">
                                <InputLabel for="abbreviation" value="Abbreviation" />
                                <TextInput id="abbreviation" v-model="form.abbreviation" type="text" class="form-control" autofocus placeholder="Please enter abbreviation" autocomplete="abbreviation" required :class="{ 'is-invalid': form.errors.abbreviation }" @input="handleInput('abbreviation')" :light="true"/>
                                <InputError :message="form.errors.abbreviation" />
                            </BCol>
                            <BCol lg="6" class="mt-1">
                                <InputLabel for="others" value="Others" />
                                <TextInput id="others" v-model="form.others" type="text" class="form-control" autofocus placeholder="Please enter others" autocomplete="others" required :class="{ 'is-invalid': form.errors.others }" @input="handleInput('others')" :light="true"/>
                                <InputError :message="form.errors.others" />
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
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputError, InputLabel, TextInput },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                name: null,
                shortcut: null,
                abbreviation: null,
                others: null
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
            this.form.shortcut = data.shortcut;
            this.form.abbreviation = data.abbreviation;
            this.form.others = data.others;
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(this.editable){
                this.form.put('/directory/courses/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            }else{
                this.form.post('/directory/courses',{
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