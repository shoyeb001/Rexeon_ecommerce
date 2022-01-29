<div id="brands-carousel" class="logo-slider wow fadeInUp">
  <div class="logo-slider-inner">
    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
      @php
          $brands = App\Models\Brand::orderBy('brand_name','ASC')->get();
      @endphp
      @foreach ($brands as $brand)
      <div class="item"> <a href="#" class="image"> <img style="width: 100%" data-echo="{{ asset($brand->brand_image) }}" src="{{ asset($brand->brand_image) }}" alt=""> </a> </div>
      @endforeach
     
      <!--/.item-->
      
      
      <!--/.item--> 
    </div>
    <!-- /.owl-carousel #logo-slider --> 
  </div>
  <!-- /.logo-slider-inner --> 
  
</div>