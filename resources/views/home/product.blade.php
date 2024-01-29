<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            
            <div class="row">
               @foreach ($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_detail',$product->id)}}" class="option1">
                           Product Details
                           </a>
                           <form action="{{url('add_cart',$product->id)}}" method="post">
                           @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1" style="width:50px">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="Add To Cart">
                                 </div>
                              </div>

                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/productImg/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>
                        <h6>
                           ${{$product->price}}
                        </h6>
                     </div>
                  </div>
               </div>
               @endforeach
               

            </div>
           
            <!-- <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div> -->
         </div>
      </section>