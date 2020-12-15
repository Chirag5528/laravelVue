<template>
    <div class="items">
        <div v-for="(item,index) in items" :key="index" class="m-2 flex flex-row">
            <list-item  :item=item />
        </div>

    </div>

</template>
<script>
import listItem from './listItem';
export default{
     props:['items'],
     components:{
         listItem
     }
 }

</script>
