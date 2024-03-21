<template lang="">
    <PageHeader title="List of Barangays" pageTitle="Location" />
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px); overflow: auto;" ref="box">
            
            <b-row class="g-2 mb-2 mt-n2">
                <b-col lg>
                    <div class="input-group mb-1">
                        <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                        <input type="text" v-model="filter.keyword" placeholder="Search Region" class="form-control" style="width: 35%;">
                        <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                            <i class="bx bx-refresh search-icon"></i>
                        </span>
                        <b-button @click="openCreate()" type="button" variant="primary">
                            <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                        </b-button>
                    </div>
                </b-col>
            </b-row>
            <div class="table-responsive">
                <table class="table table-nowrap align-middle mb-0">
                    <thead class="table-light">
                        <tr class="fs-11">
                            <th>#</th>
                            <th style="width: 15%;">Code</th>
                            <th style="width: 20%;" class="text-center">Name</th>
                            <th style="width: 15%;" class="text-center">Old Name</th>
                            <th style="width: 10%;" class="text-center">District</th>
                            <th style="width: 15%;" class="text-center">Municipality</th>
                            <th style="width: 10%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(list,index) in lists" v-bind:key="index">
                            <td>
                                {{ (meta.current_page - 1) * meta.per_page + index + 1 }}
                            </td>
                            <td>{{list.code}}</td>
                            <td class="text-center">{{list.name}}</td>
                            <td class="text-center"><span class="text-muted fst-italic">{{(list.old_name) ? list.old_name : 'Nothing found'}}</span></td>
                            <td class="text-center">{{(list.district) ? list.district : 'n/a'}}</td>
                            <td class="text-center">{{list.municipality.name}}</td>
                            <td class="text-end">
                                <b-button variant="soft-primary" @click="openView(list)" v-b-tooltip.hover title="View Activity" size="sm" class="remove-list me-1">
                                    <i class="ri-eye-fill align-bottom"></i>
                                </b-button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
            </div>

        </div>
    </div>
    <Barangay :regions="regions" ref="barangay"/>
</template>
<script>
import Barangay from './Modals/Barangay.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
import PageHeader from '@/Shared/Components/PageHeader.vue';
export default {
    props: ['regions'],
    components: { PageHeader, Pagination, Barangay },
     data(){
        return {
            lists: [],
            meta: {},
            links: {},
            filter: {
                keyword: null
            }
        }
    },
    created(){
        this.fetch();
    },
    methods: {
        fetch(page_url){
            page_url = page_url || '/lists/locations';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    count: ((window.innerHeight-350)/51),
                    option: 'barangays'
                }
            })
            .then(response => {
                if(response){
                    this.lists = response.data.data;
                    this.meta = response.data.meta;
                    this.links = response.data.links;          
                }
            })
            .catch(err => console.log(err));
        },
        openCreate(){
            this.$refs.barangay.show();
        }
    }
}
</script>