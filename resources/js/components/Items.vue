<template>
	<div>
		<section class="jumbotron text-center">
	        <div class="container">
	          <h1 class="jumbotron-heading">Networking Products</h1>
	          <p class="lead text-muted">Choose your prefered netwok products from global brand suppliers </p>
	          <p>
	            <select @change="filterItems()" v-model="selected_category" v-if="!selected_category" >
	                <option value="" disabled selected hidden>Category</option>
	                <option v-for="category in categories" :id="category.id" :value="category.category">{{category.category}}</option>
	            </select>
	        	<span v-if="selected_category">{{selected_category}}</span>
	        	<button v-if="selected_category"
	            class="badge badge-info" @click="clearCategoryFilter()">X</button>
	            
	            <select @change="filterItems()" v-model="selected_brand" v-if="!selected_brand" >
	                <option value="" disabled selected hidden>Filter Brands</option>
	                <option v-for="brand in brands" :id="brand.id" :value="brand.brand">{{brand.brand}}</option>
	            </select>
	        	<span v-if="selected_brand">{{selected_brand}}</span>
	        	<button v-if="selected_brand"
	            class="badge badge-info" @click="clearBrandFilter()">X</button>
	          </p>
	        </div>
		</section>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-4" v-for="item in items" :value="item.id">
						<div class="card mb-4 box-shadow">
							<img class="card-img-top" :src="item.fileName" alt="Image" style="height: 225px; width: 100%; display: block;"  data-holder-rendered="true">
							<div class="card-body">
			                	<h5 class="card-title">{{item.name}}</h5>
								<p class="card-text"style="font-weight: bold">Brand:  {{item.brand.brand}}</p>
								<p class="card-text" 
									style="font-family:fantasy; color:green;font-style:oblique;font-weight:bold ">
									{{item.availability? 'Available':'Out of stock'}}
								</p>
								<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<a type="button" class="btn btn-sm btn-outline-secondary" @click='getItemDetails(item.id)' :href="selected_item">Details</a>
									<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#showModal">Contact</button>

									<!-- Modal to show contact information -->
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
									<small class="text-muted">Price:{{item.price}}L.E</small>
								</div>
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
        	this.filterItems();
            // this.getItems();
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
            // getItems() {
            //     axios.get('/api/items_list')
            //         .then(response => {
            //             this.items = response.data
            //         });
            // },

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