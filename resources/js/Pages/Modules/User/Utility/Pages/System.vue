<template>
<div class="">
    <form @submit.prevent="submit()" class="customform">
        <BCard no-body>
            <BCardHeader class="align-items-center d-flex py-0">
                <BCardTitle class="mb-0 flex-grow-1">System Configuration</BCardTitle>
                <div class="flex-shrink-0">
                    <BDropdown variant="link" class="card-header-dropdown" toggle-class="text-reset dropdown-btn arrow-none"
                    menu-class="dropdown-menu-end"  :offset="{ alignmentAxis: -140, crossAxis: 0, mainAxis: 0 }">
                    <template #button-content> 
                        <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span> </template>
                        <BDropdownItem @click="openGenerate()">Generate Backup</BDropdownItem>
                        <BDropdownItem>Restore Backup</BDropdownItem>
                        <BDropdownItem>Clean Backup</BDropdownItem>
                    </BDropdown>
                </div>
            </BCardHeader>
            <BCardBody class="p-4" style="height: calc(100vh - 280px); overflow: auto;">
                <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            
                                <form class="customform" @submit.prevent="submit">
                                    <div class="row g-3">
                                        <div class="col-md-12 mb-n3">
                                            <InputLabel for="name" value="Name" required="true"/>
                                            <TextInput id="name" v-model="form.name" type="text" class="form-control" autofocus placeholder="Please enter name" autocomplete="name" required :class="{ 'is-invalid': form.errors.name }" />
                                            <InputError :message="form.errors.name" />
                                        </div>
                                        <div class="col-md-6 mb-n3">
                                            <InputLabel for="acronym" value="Acronym" required="true"/>
                                            <TextInput id="acronym" v-model="form.acronym" type="text" class="form-control" autofocus placeholder="Please enter acronym" autocomplete="acronym" required :class="{ 'is-invalid': form.errors.acronym }" />
                                            <InputError :message="form.errors.acronym" />
                                        </div>
                                        <div class="col-md-6 mb-n3">
                                            <InputLabel for="subname" value="Subname" required="true"/>
                                            <TextInput id="subname" v-model="form.subname" type="text" class="form-control" autofocus placeholder="Please enter subname" autocomplete="subname" required :class="{ 'is-invalid': form.errors.subname }" />
                                            <InputError :message="form.errors.subname" />
                                        </div>
                                        <div class="col-md-12 mb-n2">
                                            <InputLabel for="description" value="Description" required="true"/>
                                            <Textarea id="description" v-model="form.description" type="text" class="form-control" autofocus placeholder="Please enter description" autocomplete="description" required :class="{ 'is-invalid': form.errors.description }" />
                                            <InputError :message="form.errors.description" />
                                        </div>
                                         <div class="col-md-6">
                                            <InputLabel for="acronym" value="Version" required="true"/>
                                            <TextInput id="acronym" v-model="form.version" type="text" class="form-control" :readonly="true"/>
                                        </div>
                                        <div class="col-md-6">
                                            <InputLabel for="subname" value="Last Updated" required="true"/>
                                            <TextInput id="subname" v-model="form.updated_at" type="text" class="form-control" :readonly="true"/>
                                        </div>
                                    </div>
                                </form>
                            
                        </div>
                        
                    </div>
                </div>
                <!-- <div class="col-md-5">
                    
                        <div v-for="(list,index) in variables" v-bind:key="index">
                            <div class="input-group mb-2">
                                <div class="input-group-text fs-10 text-muted fw-semibold" style="width: 130px;">{{list.name}}</div>
                                <input type="text" class="form-control" :name="list.name" v-model="list.value">
                            </div>
                            <hr v-if="list.line" class="text-muted"/>
                        </div>
                    <BButton @click="update" variant="light" class="w-100" type="submit">Update .env</BButton>
                   
                </div> -->
            </div>
            </BCardBody>
        </BCard>
    </form>
</div>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import InputError from '@/Shared/Components/Forms/InputError.vue';
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import Textarea from '@/Shared/Components/Forms/Textarea.vue';
import Layout from "@/Shared/Layouts/Main.vue";
import profile from "@/Pages/Modules/User/Utility/Index.vue";
export default {
    layout: (h,page) => {
        return h(Layout, [
            h(profile,[page])
        ])
    },
    components: { InputError, InputLabel, TextInput, Textarea },
    props: ['variables','configuration'],
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                name: this.configuration.name,
                acronym: this.configuration.acronym,
                subname: this.configuration.subname,
                description: this.configuration.description,
                version: this.configuration.version,
                updated_at: this.configuration.updated_at
            }),
        }
    },
    methods: {
        update(){
            this.$refs.update.show(this.variables);
        }
    }
}
</script>