<template>
    <div class="container">
        <div class="row offset-1">
            <label for="category">Filter by Category
                <select @change="filterItems()" v-model="selected_category">
                    <option value="" disabled selected hidden>Filter By Category</option>
                    <option v-for="category in categories" :id="category.id" :value="category.id">{{category.category}}</option>
                </select>
            </label>
        </div>
        <div class="row">
            <div  v-for="item in items" :value="item.id">
                <div class="card" style="width: 16rem;">
                    <a @click='getItemDetails(item.id)' :href="selected_item">
                        <img :src="item.fileName" class="card-img-top" alt="..." style="height: 10rem;width: 10rem;" >
                    </a>
                    <div class="card-body">
                        <h5 class="card-title" style=" color: blue;font-weight: bold ">{{item.name}}</h5>
                        <div class="row">
                            <h6 class="card-text" style="font-weight: bold">
                                Brand:  {{item.brand.brand}}
                            </h6>
                        </div>
                        <div class="row">
                            <h6 class="card-text">
                                Price:{{item.price}}L.E
                            </h6>
                        </div>
                        <div class="row offset-6">
                            <p class="card-text" style="font-family:  fantasy; color: green; size: 10px;font-style: oblique; font-weight: bold ">
                                {{item.availability? 'Available':'Out of stock'}}
                            </p>
                        </div>
                    </div>
                </div>
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