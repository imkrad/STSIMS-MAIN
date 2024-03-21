<template>
<div class="">
    <form @submit.prevent="submit()" class="customforma">
        <BCard no-body>
            <BCardHeader class="align-items-center d-flex py-0" style="height: 59px;">
                <BCardTitle class="mb-0 flex-grow-1">Role Management</BCardTitle>
                <div class="flex-shrink-0">
                    <div class="input-group">
                        <!-- <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                        <input type="text" placeholder="Search Role" v-model="filter.keyword" class="form-control" style="width: 35%;">
                        <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                            <i class="bx bx-refresh search-icon"></i>
                        </span> -->
                        <b-button type="button" variant="primary" @click="openCreate">
                            <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                        </b-button>
                    </div>
                </div>
            </BCardHeader>
            <BCardBody class="p-4" style="height: calc(100vh - 280px); overflow: auto;">
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="fs-11">
                                <th></th>
                                <th style="width: 87%;">Name</th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(list,index) in lists" v-bind:key="index" :class="[(list.is_active == 0) ? 'table-warnings' : '']">
                                <td>
                                    {{index+1}}
                                </td>
                                <td>
                                    <h5 class="fs-13 mb-0 text-dark">{{list.name}}</h5>
                                    <p class="fs-11 text-muted mb-0">{{list.description}}</p>
                                </td>
                                <td class="text-end">
                                    <b-button @click="openEdit(list,index)" variant="soft-primary" v-b-tooltip.hover title="Edit" size="sm" class="edit-list">
                                        <i class="ri-pencil-fill align-bottom"></i>
                                    </b-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
                </div>
            </BCardBody>
        </BCard>
    </form>
    <Create ref="create"/>
</div>
</template>
<script>
import _ from 'lodash';
import Create from '../Modals/Roles/Create.vue';
import Layout from "@/Shared/Layouts/Main.vue";
import profile from "@/Pages/Modules/User/Utility/Index.vue";
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    layout: (h,page) => {
        return h(Layout, [
            h(profile,[page])
        ])
    },
    components: { Pagination, Create },
    data(){
        return {
            currentUrl: window.location.origin,
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: ''
            },
        }
    },
    created(){
        this.fetch();
    },
    watch: {
        "filter.keyword"(newVal){
            this.checkSearchStr(newVal)
        },
        '$page.props.flash' : {
            deep: true,
            handler(val = null) {
                if(val.type === 'update'){
                    this.lists[this.index] = val.data.data;
                }else if(val.type === 'create'){
                    this.lists.push(val.data);
                }
            }
        }
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/utility/roles';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    count: ((window.innerHeight-400)/58),
                    option: 'lists'
                }
            })
            .then(response => {
                this.lists = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links; 
            })
            .catch(err => console.log(err));
        },
        openCreate(){
            this.$refs.create.show();
        },
        openEdit(data,index){
            this.index = index;
            this.$refs.create.edit(data);
        }
    }
}
</script>