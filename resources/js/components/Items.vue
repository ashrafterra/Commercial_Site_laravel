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
            <div class="card-deck">
              <div class="card" v-for="item in items" :value="item.id">
                <a @click='getItemDetails(item.id)' :href="selected_item">
                    <img :src="item.fileName" class="card-img-top" alt=".... " width="80" height="150">
                </a>
                <div class="card-body">
                    <h5 class="card-title" style=" color: blue;font-weight: bold ">{{item.name}}</h5>
                    <p class="card-text"style="font-weight: bold">Brand:  {{item.brand.brand}}</p>
                    <p class="card-text" 
                    style="font-family:fantasy; color:green;font-style:oblique;font-weight:bold ">
                        {{item.availability? 'Available':'Out of stock'}}
                    </p>
                </div>
                <div class="card-footer">
                  <div class="row"><small class="text-muted">Price:{{item.price}}L.E</small></div>
                  <!-- Modal to show contact information -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showModal">
                    Contact us now!
                    </button>
                    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="showModalLabel">UTC Egypt</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row offset-1">
                                <div class="col-3"> Telephone: </div>
                                <div class="col-8"> {{item.contact_telephone}} </div>
                            </div>
                            <div class="row offset-1">
                                <div class="col-3"> Email: </div>
                                <div class="col-8"> {{item.contact_email}} </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal End-->
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
            // this.listenForBroadcast();
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

            // listenForBroadcast(){
            //     Echo.join(`chat`)
            //     .listen('.MessagePushed', (e) => {
            //     console.log(e.update);});
            // },
        }
    }
</script>