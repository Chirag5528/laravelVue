<template>
    <div class="container flex flex-col justify-center h-screen bg-gray-200 w-full px-3">
        <add-item-form v-on:reloadList="getItems()" />
        <all-list-items :items ="items" v-on:reloadList="getItems()" />
    </div>

</template>

<script>
import AddItemForm from './addItemForm';
import allListItems from './allListItems';
export default{
    components:{
        AddItemForm,
        allListItems
    },
    data:function(){
            return{
                items:[]
            }
    },
    methods:{

        getItems(){

            axios.get('/api/items')
            .then( response => {
                this.items = response.data;
            })
            .catch()

        }

    },
    created(){
        this.getItems();
    }
}
</script>
