<template>
    <b-modal v-model="showModal" :size="(form.has_child) ? 'lg' : ''" header-class="p-3 bg-light" :title="(!editable) ? 'Create Menu' : 'Edit Menu'" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow>
                <BCol lg="12">
                    <div>
                        <h6 class="mb-1">Menu Information</h6>
                        <p class="text-muted fs-11 mt-n1">Please ensure the user's profile information is accurate and valid. </p>
                    </div>
                    <div>
                        <BRow class="g-3">
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol>
                            <BCol lg="12" class="mt-1">
                                <InputLabel for="name" value="Menu name" :message="form.errors.name"/>
                                <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter firstname" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" @input="handleInput('name')" :light="true" />
                            </BCol>
                            <!-- <BCol lg="12"><hr class="text-muted mt-n1 mb-n4"/></BCol> -->
                            <BCol :lg="(!form.has_child) ? '6' : '4'"  class="mt-0 mb-n3">
                                <InputLabel for="icon" value="Icon" :message="form.errors.icon"/>
                                <TextInput id="icon" v-model="form.icon" type="text" class="form-control" autofocus placeholder="Please enter icon" autocomplete="icon" required :class="{ 'is-invalid': form.errors.icon }" @input="handleInput('icon')" :light="true"/>
                            </BCol>
                            
                            <BCol lg="6" class="mt-0" v-if="!form.has_child">
                                <InputLabel for="route" value="Route" :message="form.errors.route"/>
                                <TextInput id="route" v-model="form.route" type="text" class="form-control" autofocus placeholder="Please enter route" autocomplete="route" required :class="{ 'is-invalid': form.errors.route }" @input="handleInput('route')" :light="true"/>
                            </BCol>
                            <BCol :lg="(!form.has_child) ? '6' : '4'" class="mt-0">
                                <InputLabel for="path" value="File Path" :message="form.errors.path"/>
                                <TextInput id="path" v-model="form.path" type="text" class="form-control" autofocus placeholder="Please enter path" autocomplete="path" required :class="{ 'is-invalid': form.errors.path }" @input="handleInput('path')" :light="true"/>
                            </BCol>
                             <BCol :lg="(!form.has_child) ? '6' : '4'" class="mt-0">
                                <InputLabel for="path" value="Group" :message="form.errors.group"/>
                                <Multiselect :options="['Menu','Lists']" v-model="form.group" :message="form.errors.group" placeholder="Select Group"/>
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n3"/></BCol>
                            <BCol lg="8"  style="margin-top: 13px; margin-bottom: -12px;" class="fs-12">Does your menu have a child menu?</BCol>
                            <BCol lg="4"  style="margin-top: 13px; margin-bottom: -12px;">
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2" :value="true" v-model="form.has_child">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="false" v-model="form.has_child">
                                            <label class="custom-control-label fw-normal fs-12" for="customRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </BCol>
                            <BCol lg="12"><hr class="text-muted mt-n1 mb-n3"/></BCol>
                            <BCol lg="12" v-if="form.has_child">
                                    <BCardHeader class="align-items-center d-flex py-0 mb-3">
                                        <BCardTitle class="mb-0 flex-grow-1 fs-13 mb-2">Sub menus</BCardTitle>
                                        <div class="flex-shrink-0">
                                            <b-button @click="addSubmenu" variant="primary" class="waves-effect btn-sm waves-light mb-3">Add Menu</b-button>
                                        </div>
                                    </BCardHeader>
                                    
                                    <BRow class="g-2 mt-n2 mb-1" v-for="(menu, index) in form.submenus" :key="index">
                                        <BCol lg="4">
                                            <TextInput id="icon" v-model="menu.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors['submenus.'+index+'.name'] }" @input="handleInput('name')" :light="true"/>
                                        </BCol>
                                        <BCol lg="7">
                                            <BRow class="g-2">
                                                <BCol lg="6">
                                                    <TextInput id="icon" v-model="menu.route" type="text" class="form-control" autofocus placeholder="Please enter route" autocomplete="route" required :class="{ 'is-invalid': form.errors['submenus.'+index+'.route'] }" @input="handleInput('route')" :light="true"/>
                                                </BCol>
                                                <BCol lg="6">
                                                    <TextInput id="icon" v-model="menu.path" type="text" class="form-control" autofocus placeholder="Please enter path" autocomplete="path" required :class="{ 'is-invalid': form.errors['submenus.'+index+'.path'] }" @input="handleInput('path')" :light="true"/>
                                                </BCol>
                                            </BRow>
                                        </BCol>
                                        <BCol lg="1">
                                            <b-button @click="removeSubmenu(index)" variant="primary" class="waves-effect waves-light"><i class="ri-delete-bin-fill"></i></b-button>
                                        </BCol>
                                    </BRow>
                                <!-- </BRow> -->
                            </BCol>
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
import Multiselect from '@/Shared/Components/Forms/Multiselect.vue'
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
export default {
    components: { InputLabel, TextInput, Multiselect },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                name: null,
                icon: null,
                route: null,
                path: null,
                group: null,
                has_child: false,
                is_mother: true,
                submenus: [
                    {name: '', route: '', path: ''}
                ]
            }),
            showModal: false,
            editable: false
        }
    },
    watch : {
        "form.has_child"(){
            if(this.form.has_child){
                this.form.route = '';
                this.form.is_mother = true;
            };
        }
    },
    methods: { 
        show(){
            this.showModal = true;
        },
        submit(){
            this.form.post('/utility/menus',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.hide();
                },
            });
        },
        addSubmenu() {
            this.form.submenus.push({name: '', route: '', path: ''});
        },
        removeSubmenu(index) {
            this.form.submenus.splice(index, 1);
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            // this.form.reset();
            // this.form.clearErrors();
            // this.editable = false;
            this.showModal = false;
        }
    }
}
</script>