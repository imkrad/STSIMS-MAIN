<template>
    <b-modal v-model="showModal" header-class="p-3 bg-light" title="Privilege Status" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <div>
            <div class="mt-1 mb-n3">
                <div class="avatar-md mx-auto">
                    <div class="avatar-title rounded-circle bg-light">
                        <i class="h1 mb-0" :class="(!status) ? 'bx bxs-lock-open text-success' : 'bx bxs-lock text-danger'"></i>
                    </div>
                </div>
                <div class="p-2 mt-2 text-center">
                    <h6 class="mb-1" v-if="status">"Deactivate course status."</h6>
                    <h6 class="mb-1" v-else>"Activate course status."</h6>
                    <p v-if="status" class="font-size-12 text-muted"><span class="text-danger fw-semibold">{{name}}</span> will no longer be in the list of priority courses.</p>
                    <p v-else class="font-size-12 text-muted"><span class="text-success fw-semibold">{{name}}</span> will be in the list of priority courses.</p>
                </div>
            </div>
        </div>
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import { useForm } from '@inertiajs/vue3';
export default {
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                is_active: null
            }),
            name: null,
            status: null,
            showModal: false,
        }
    },
    methods: { 
        show(name,data){
            this.name = name;
            this.status = data.is_active,
            this.form.id = data.id,
            this.form.is_active = (data.is_active == 1) ? 0 : 1,
            this.showModal = true;
        },
        submit(){
            this.form.put('/directory/courses/update', {
                errorBag: 'updateProfileInformation',
                preserveScroll: true,
                onSuccess: () => {
                    this.hide();
                },
            });
        },
        hide(){
            this.user = {};
            this.form.reset();
            this.form.clearErrors();
            this.showModal = false;
        }
    }
}
</script>