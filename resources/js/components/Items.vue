<template>
    <div class="container">
        <div class="row">
            <label for="category">Filter by Category
                <select @change="filterItems()" v-model="selected_category">
                    <option value="" disabled selected hidden>Filter By Category</option>
                    <option v-for="category in categories" :id="category.id" :value="category.id">{{category.category}}</option>
                </select>
            </label>
        </div>
        <div class="row">
            <div  class="col-sm-6 col-md-4 col-xl-3 mb-3" v-for="item in items" :value="item.id">
                <a @click='getItemDetails(item.id)' :href="selected_item">
                    <img :src="item.fileName" class="img-thumbnail mb-3" alt="..." height= "480" width="300" >
                    <h5 class="mb-1" style=" color: blue;font-weight: bold ">{{item.name}}</h5>
                </a>
                <p class="text-muted" style="font-weight: bold"> Brand:  {{item.brand.brand}}</p>
                <p class="text-muted" >Price:{{item.price}}L.E</p>
                <p class="card-text" style="font-family:fantasy; color:green;font-style:oblique;font-weight:bold ">
                                {{item.availability? 'Available':'Out of stock'}}
                </p>
            </div>   
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                items: [],
                categories:[],
                selected_category: '',
                selected_item:'',
            }
        },
        mounted() {
            this.getItems();
            this.getCategories();
            this.listenForBroadcast();
        },

        methods: { 
            getItems() {
                axios.get('/api/items_list')
                    .then(response => {
                        this.items = response.data
                    });
            },

            getCategories(){
                axios.get('/categories')
                    .then(response => {
                        this.categories = response.data;
                    });
            },

            filterItems(){
                axios.get('/categories/'+this.selected_category)
                    .then(response => {
                        this.items = response.data;
                    });
            },
            getItemDetails(item){
                this.selected_item = '/items/'+item;
            },

            listenForBroadcast(){
                Echo.join(`chat`)
                .listen('.MessagePushed', (e) => {
                console.log(e.update);});
            },
        }
    }
</script>