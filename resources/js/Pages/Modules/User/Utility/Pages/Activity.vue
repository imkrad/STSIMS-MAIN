<template>
<div class="">
    <form @submit.prevent="submit()" class="customform">
        <BCard no-body>
           <BCardHeader class="align-items-center d-flex py-0">
                <BCardTitle class="mb-0 flex-grow-1">Activity Logs</BCardTitle>
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
                <div class="profile-timeline">
                    <simplebar style="height: calc(100vh - 350px); overflow: auto;">
                        <div class="accordion accordion-flush" id="todayExample">
                            <div class="accordion-item border-0" v-for="(list,index) in lists" v-bind:key="index">
                                <div class="accordion-header" id="headingOne">
                                    <BLink class="accordion-button p-2 shadow-none" @click="toggleAccordion(index)" >
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-light text-muted rounded-circle">
                                                <i v-if="list.event === 'updated'" class="ri-edit-circle-fill text-warning"></i>
                                                <i v-else-if="list.event === 'created'" class="ri-add-circle-fill text-success"></i>
                                                <i v-else class="ri-user-3-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-14 mb-1">{{list.log_name}}</h6>
                                                <small class="text-muted" v-if="list.event === 'updated'"> You {{list.description}} on {{list.created_at}}</small>
                                                <small class="text-muted" v-if="list.event === 'created'"> You created a new user on {{list.created_at}}</small>
                                            </div>
                                        </div>
                                    </BLink>
                                </div>

                                <BCollapse id="collapseOne" v-model="list.status">
                                    <div class="accordion-body ms-2 ps-5">
                                        <div v-if="list.event === 'updated'">
                                            Updated <span class="text-warning fst-italic" v-for="(old,key,index) in list.properties.old" v-bind:key="index">{{key}} : {{old}}, </span> to <span class="text-success fst-italic" v-for="(news,key,index) in list.properties.attributes" v-bind:key="index">{{key}} : {{news}}, </span>
                                        </div>
                                        <div v-if="list.event === 'created'">
                                            Created a new user, <span class="text-success fst-italic">{{list.name}}</span>
                                        </div>
                                    </div>
                                </BCollapse>
                            </div>
                        </div>
                    </simplebar>
                </div>
            </BCardBody>
        </BCard>
    </form>
</div>
</template>
<script>
import simplebar from "simplebar-vue";
import Pagination from "@/Shared/Components/Pagination.vue";
import Layout from "@/Shared/Layouts/Main.vue";
import profile from "@/Pages/Modules/User/Utility/Index.vue";
export default {
    layout: (h,page) => {
        return h(Layout, [
            h(profile,[page])
        ])
    },
    components: { Pagination, simplebar },
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
            page_url = page_url || '/utility/logs/activities';
            axios.get(page_url,{
                params : {
                    keyword: this.filter.keyword,
                    counts: ((window.innerHeight-450)/56),
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
        toggleAccordion(accordionNumber) {
            for (let key in this.lists) {
                if (key != accordionNumber) {
                this.lists[key].status = false;
                }
            }
            this.lists[accordionNumber].status = !this.lists[accordionNumber].status;
        }
    }
}
</script>