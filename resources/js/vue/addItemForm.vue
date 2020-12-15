<template>
    <div class="addItem">
         <div class="form-group">
             <h1 class="text-2xl">Add A New Item</h1>
         </div>
         <label for="itemName">Item Name</label>
         <div class="form-group">

             <input id="itemName" class="border focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
            v-model="item.name"
         />
         <button
            :class="[
                'text-white rounded p-2 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50',item.name ? 'bg-green-600 inline-block' : 'bg-gray-600 hidden']"
            @click="addItem()"
            ><span class="fa fa-plus"></span></button>

        <button :class="['bg-red-600 text-white rounded p-2 hover:bg-red-700', item.name ? 'inline-block' : 'hidden' ]"><span class="fa fa-trash"></span></button>
         </div>
    </div>
</template>
<script>
    export default{

        data: function(){
            return {
                    item:{
                        name:""
                    }
                }
        },
        methods:{
            addItem(){
                if( this.item.name == "" ){
                    return;
                }

                axios.post('api/item/store',{
                    name:this.item.name
                }).then( response => {
                    if( response.status == 201 ) {
                        this.item.name = "";
                    }
                }).catch( error => {
                    //
                })

            }
        }

    }
</script>
