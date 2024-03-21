<template>
    <div class="col-md-12 mb-3">
        <div class="input-group mb-1">
            <span class="input-group-text"> <i class="ri-search-line search-icon"></i></span>
            <input type="text" v-model="searchTerm" @input="search" placeholder="Search" class="form-control" style="width: 40%;">
        </div>
    </div>
    <div class="table-responsive">
        <simplebar data-simplebar style="height: calc(100vh - 300px);">
            <table class="table table-nowrap align-middle mb-0">
                <thead class="table-light thead-fixed">
                    <tr class="fs-11">
                        <th style="width: 5%;" class="text-center">#</th>
                        <th style="width: 25%;">Name</th>
                        <th style="width: 15%;" class="text-center">Classification</th>
                        <th style="width: 15%;" class="text-center">Type</th>
                        <th style="width: 10%;" class="text-center">Color</th>
                        <th style="width: 10%;" class="text-center">Others</th>
                        <th style="width: 10%;" class="text-center">Status</th>
                        <th style="width: 5%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(list,index) in selected.lists" v-bind:key="index" :class="(index == matchedRowIndex) ? 'table-warning' : ''" :id="'row-' + index">
                        <td class="text-center">{{index+1}}</td>
                        <td>{{list.name}}</td>
                        <td class="text-center">{{list.classification}}</td>
                        <td class="text-center" :class="(list.type == 'n/a') ? 'text-muted fs-11' : ''">{{list.type}}</td>
                        <td class="text-center" :class="(list.color == 'n/a') ? 'text-muted fs-11' : ''">{{list.color}}</td>
                        <td class="text-center" :class="(list.others == 'n/a') ? 'text-muted fs-11' : ''">{{list.others}}</td>
                        <td class="text-center">
                            <span :class="(list.is_active) ? 'badge bg-success' : 'badge bg-danger'">
                                <span v-if="list.is_active">Active</span>
                                <span v-else>Inactive</span>
                            </span>
                        </td>
                        <td class="text-end">
                            <b-button variant="soft-primary" v-b-tooltip.hover title="Edit" size="sm"><i class="ri-edit-circle-fill align-bottom"></i> </b-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </simplebar>
    </div>
</template>

<script>
import simplebar from 'simplebar-vue';
export default {
    components: { simplebar },
    data(){
        return {
            selected: {},
            searchTerm: '',
            matchedRowIndex: null,
        }
    },
    methods: {
        show(data){
            this.selected = data;
        },
        search() {
            const searchTerm = this.searchTerm.toLowerCase();
            const matchedIndex = this.selected.lists.findIndex(
                (l) => l.name.toLowerCase().includes(searchTerm)
            );
            if (matchedIndex !== -1 && searchTerm !== '') {
                this.matchedRowIndex = matchedIndex;

                const rowId = 'row-' + matchedIndex;
                const matchedRow = document.getElementById(rowId);

                if (matchedRow) {
                matchedRow.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            } else {
                this.matchedRowIndex = null;
            }
        },
    }
}
</script>
<style>
.thead-fixed {
   position: sticky;
   top: 0;
   background-color: #fff; /* Set the background color for the fixed header */
   z-index: 1; /* Ensure the fixed header is above the scrolling content */
}
</style>