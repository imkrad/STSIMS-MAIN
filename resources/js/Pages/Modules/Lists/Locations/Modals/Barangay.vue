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
                    <div class="col-md-6 mb-n2">
                        <InputLabel for="region" value="Region"/>
                        <Multiselect :options="regions" v-model="form.region" :message="form.errors.region" placeholder="Select Region"/>
                    </div>
                    <div class="col-md-6 mb-n2">
                        <InputLabel for="province" value="Province"/>
                        <Multiselect :options="provinces" v-model="form.province" :message="form.errors.province" placeholder="Select Province"/>
                    </div>
                    <div class="col-md-6 mb-n2">
                        <InputLabel for="municipality" value="Municiaplity"/>
                        <Multiselect :options="municipalities" v-model="form.municipality" :message="form.errors.municipality" placeholder="Select Municipality"/>
                    </div>
                    <div class="col-md-12 mb-n3">
                        <InputLabel for="old_name" value="Old name"/>
                        <TextInput id="old_name" v-model="form.old_name" type="text" class="form-control" autofocus placeholder="Please enter old name" autocomplete="old_name" required :class="{ 'is-invalid': form.errors.old_name }" />
                        <InputError :message="form.errors.old_name" />
                    </div>
                    <div class="col-md-6">
                        <InputLabel for="district" value="District"/>
                        <TextInput id="district" v-model="form.district" type="text" class="form-control" autofocus placeholder="Please enter district" autocomplete="district" required :class="{ 'is-invalid': form.errors.district }" />
                        <InputError :message="form.errors.district" />
                    </div>
                    <div class="col-md-6">
                        <InputLabel for="zipcode" value="Zip Code"/>
                        <TextInput id="zipcode" v-model="form.zipcode" type="text" class="form-control" autofocus placeholder="Please enter zipcode" autocomplete="zipcode" required :class="{ 'is-invalid': form.errors.zipcode }" />
                        <InputError :message="form.errors.zipcode" />
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
    components : { InputError, InputLabel, TextInput, Multiselect },
    props: ['regions'],
    data(){
        return {
            showModal: false,
            form: useForm({
                code: null,
                name: null,
                old_name: null,
                municipality: null,
                zipcode: null,
                district: null,
                type: 'barangay'
            }),
            provinces: [],
            municipalities: []
        }
    },
    watch: {
        'form.region'(){
            (this.form.region) ? this.fetchProvince(this.form.region) : '';
        },
        'form.province'(){
            (this.form.province) ? this.fetchMunicipality(this.form.province) : '';
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
        fetchProvince(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_province',
                    code: code
                }
            })
            .then(response => {
                this.provinces = response.data;
            })
            .catch(err => console.log(err));
        },
        fetchMunicipality(code){
            axios.get('/lists/locations/',{
                params: {
                    option: 'list_municipality',
                    code: code
                }
            })
            .then(response => {
                this.municipalities = response.data;
            })
            .catch(err => console.log(err));
        },
        hide(){
            this.showModal = false;
        },
    }
}
</script>
