<template>
    <b-row class="g-2 mb-2 mt-n2">
        <b-col lg>
            <div class="input-group mb-1">
                <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
                <input type="text" v-model="filter.keyword" placeholder="Search Course" class="form-control" style="width: 35%;">
                <span @click="refresh" class="input-group-text" v-b-tooltip.hover title="Refresh" style="cursor: pointer;"> 
                    <i class="bx bx-refresh search-icon"></i>
                </span>
                <b-button type="button" variant="primary" @click="openCreate">
                    <i class="ri-add-circle-fill align-bottom me-1"></i> Create
                </b-button>
            </div>
        </b-col>
    </b-row>
    <div class="table-responsive">
        <table class="table table-nowrap align-middle mb-0">
            <thead class="table-light">
                <tr class="fs-11">
                    <th></th>
                    <th style="width: 34%;">Name</th>
                    <th style="width: 28%;" class="text-center">Shortcut</th>
                    <th style="width: 10%;" class="text-center">Abbreviation</th>
                    <th style="width: 10%;" class="text-center">Others</th>
                    <th style="width: 10%;" class="text-center">Status</th>
                    <th style="width: 5%;"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(list,index) in lists" v-bind:key="index">
                    <td> {{ (meta.current_page - 1) * meta.per_page + index + 1 }}</td>
                    <td>{{list.display_name}}</td>
                    <td class="text-center"><span :class="(list.display_shortcut == 'Not Available') ? 'text-muted' : ''">{{list.display_shortcut}}</span></td>
                    <td class="text-center"><span :class="(list.display_abbreviation == 'Not Available') ? 'text-muted' : ''">{{list.display_abbreviation}}</span></td>
                    <td class="text-center"><span :class="(list.display_others == 'Not Available') ? 'text-muted' : ''">{{list.display_others}}</span></td>
                    <td class="text-center">
                        <span v-if="list.is_active" class="badge bg-success">Active</span>
                        <span v-else class="badge bg-danger">Inactive</span>
                    </td>
                    <td>
                        <b-button @click="openActivate(list,index)" variant="soft-info" v-b-tooltip.hover title="View" size="sm" class="me-1">
                            <i class="ri-eye-fill align-bottom"></i>
                        </b-button>
                        <b-button @click="openEdit(list,index)" variant="soft-warning" v-b-tooltip.hover title="Edit" size="sm">
                            <i class="ri-pencil-fill align-bottom"></i>
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination class="ms-2 me-2" v-if="meta" @fetch="fetch" :lists="lists.length" :links="links" :pagination="meta" />
    </div>
    <Create ref="create"/>
    <Activation ref="activate"/>
</template>
<script>
import _ from 'lodash';
import Create from '../Modals/Create.vue';
import Activation from '../Modals/Activation.vue';
import Pagination from "@/Shared/Components/Pagination.vue";
export default {
    components: { Pagination, Create, Activation },
    data(){
        return {
            lists: [],
            meta: {},
            links: {},
            index: null,
            filter: {
                keyword: null
            }
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
                if(val.status){
                    this.lists[this.index] = val.data.data;
                }
            }
        }
    },
    methods: {
        checkSearchStr: _.debounce(function(string) {
            this.fetch();
        }, 300),
        fetch(page_url){
            page_url = page_url || '/directory/courses';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    count: ((window.innerHeight-370)/51),
                    option: 'lists'
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
            this.$refs.create.show();
        },
        openEdit(data,index){
            this.index = index;
            this.$refs.create.edit(data);
        },
        openActivate(data,index){
            this.index = index;
            this.$refs.activate.show(data.shortcut,data);
        }
    }
}
</script>