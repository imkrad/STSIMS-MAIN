<template>
    <b-modal v-model="showModal" title="Generate Backup" header-class="p-3 bg-light" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>    
        <div class="col-xl-12">
            <div class="mt-xl-0 mt-5">
                <div class="d-flex">
                    <div class="flex-grow-1 mt-2 mb-n2">
                        <p class="text-muted">Are you sure you want to generate a backup? This process may take some time to complete. Please ensure that you're ready to proceed.</p>
                        <div class="alert alert-success material-shadow fs-11">
                            The backup will include all data up to the moment you click the "Generate" button. Any changes made after this time will not be included in the backup.
                        </div>
                        <!-- <div v-else class="alert alert-warning material-shadow" role="alert" aria-live="polite" aria-atomic="true">
                            Generate backup now?
                        </div> -->
                    </div>
   
                </div>
            </div>
        </div>
         <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="create('ok')" variant="primary" :disabled="form.processing" block>Generate</b-button>
        </template>
    </b-modal>
</template>
<script>
export default {
    data(){
        return {
            showModal: false,
            form: {},
            flag: false
        }
    },
    methods : {
        show() {
            this.showModal = true;
        },
        create(){
            this.flag = true;
            this.form = this.$inertia.form({});
            this.form.get('/utility/backups/create',{
                preserveScroll: true,
                onSuccess: (response) => {
                    this.flag = false;
                    this.showModal = false;
                },
            });
        },
        hide(){
            this.showModal = false;
        },
    }
}
</script>
<style>
.multiselect__single {
    font-size: 12px;
}
</style>
