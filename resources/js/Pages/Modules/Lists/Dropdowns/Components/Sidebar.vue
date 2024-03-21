<template>
    <div class="p-4 d-flex flex-column h-100">
        <b-row class="g-2 mb-2 mt-n2">
            <b-col lg>
                <div class="input-group mb-1">
                    <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                    <input type="text" placeholder="Search User" class="form-control" style="width: 35%;">
                    <b-button @click="openCreate()" type="button" variant="primary">
                        <i class="ri-add-circle-fill search-icon"></i>
                    </b-button>
                </div>
            </b-col>
        </b-row>
        <hr class="text-muted mt-1 mb-3"/>
        <b-list-group>
            <BListGroupItem @click="selectDropdown(dropdown)" v-for="(dropdown,index) in dropdowns" v-bind:key="index" class="d-flex justify-content-between align-items-center" style="cursor: pointer;">
                {{dropdown.name}} <span class="badge bg-light text-primary">{{dropdown.lists.length}}</span>
            </BListGroupItem>
        </b-list-group>
    </div>
    <Create :dropdowns="dropdowns" ref="create"/>
</template>
<script>
import Create from '../Modals/Create.vue';
export default {
    props: ['dropdowns'],
    components: { Create },
    methods: {
        selectDropdown(data){
            this.$parent.select(data);
        },
        openCreate(){
            this.$refs.create.show();
        }
    }
}
</script>