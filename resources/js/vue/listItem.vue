<template>
    <div class="">
        <label class="inline-flex items-center">
            <input type="checkbox" class="form-checkbox" @click="changeStatus()" :checked="item.completed ? true: false"  :v-model="item.completed">
            <span :class=" [ item.completed ? 'completed':'', 'ml-2' ] ">{{ item.name }}</span>
            <span class="ml-2 p-1 bg-red-500 text-white fa fa-trash" @click="deleteList()" ></span>
        </label>
    </div>
</template>
<script>
export default{
    props:["item"],
    methods:{
        deleteList(){
            console.log("this was pressed");
        },
        changeStatus() {
            this.item.completed = ! this.item.completed;
            axios.put('/api/item/' + this.item.id, {
                item: this.item
            }).then( response => {
                if( response.status == 200 ){
                    this.$emit('ItemChanged');
                }
            }).catch( error => {
                console.log(error);
            })
        }
    },
    data: function(){
        return {
            items:this.item
        }
    }
}
</script>
<style scoped>
.completed{
    font-weight:bold;
    text-decoration:line-through;
}
</style>
