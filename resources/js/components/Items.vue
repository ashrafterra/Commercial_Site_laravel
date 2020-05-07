<template>
    <div>
    	<div class="row">
    		<div class="col-2 border">
				<div class="row mb-4">
		                <select @change="filterItems()" v-model="selected_category" v-if="!selected_category" >
		                    <option value="" disabled selected hidden>Filter Category</option>
		                    <option v-for="category in categories" :id="category.id" :value="category.category">{{category.category}}</option>
		                </select>
		            <span v-if="selected_category">{{selected_category}}</span><button v-if="selected_category"
		                class="badge badge-info" @click="clearCategoryFilter()">X</button>
		        </div>
		        <div class="row mb-4">
		                <select @change="filterItems()" v-model="selected_brand" v-if="!selected_brand" >
		                    <option value="" disabled selected hidden>Filter Brands</option>
		                    <option v-for="brand in brands" :id="brand.id" :value="brand.brand">{{brand.brand}}</option>
		                </select>
		            <span v-if="selected_brand">{{selected_brand}}</span><button v-if="selected_brand"
		                class="badge badge-info" @click="clearBrandFilter()">X</button>
		        </div>
    		</div>
    		<div class="col-9">
    			<div class="row">
		            <div class="col-sm-3" v-for="item in items" :value="item.id">
		              <div class="card">
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
    	</div>               
    </div>
</template>

<script>
    export default {
        data() {
            return{
                items: [],
                categories:[],
                brands:[],
                selected_category:"",
                selected_brand:"",
                selected_item:'',
            }
        },
        mounted() {
            this.getItems();
            this.getFilters();
            // this.listenForBroadcast();
        },

        methods: {

        	clearCategoryFilter(){
        		this.selected_category="";
        		this.filterItems();
        	},

        	clearBrandFilter(){
        		this.selected_brand="";
        		this.filterItems();
        	},  
            getItems() {
                axios.get('/api/items_list')
                    .then(response => {
                        this.items = response.data
                    });
            },

            getFilters(){
                axios.get('/filters')
                    .then(response => {
                        this.categories = response.data.categories;
                        this.brands = response.data.brands;
                    });
            },

            filterItems(){
				axios({
					method: 'post',
					url: '/filters/1',
					data: {
						brand: this.selected_brand,
						category: this.selected_category
					}
				})
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