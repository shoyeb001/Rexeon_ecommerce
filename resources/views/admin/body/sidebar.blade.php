<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">	
  
      <div class="user-profile">
    <div class="ulogo">
       <a href="index.html">
        <!-- logo for regular state and mobile devices -->
         <div class="d-flex align-items-center justify-content-center">					 	
            <img src="../images/logo-dark.png" alt="">
            <h3><b>Sunny</b> Admin</h3>
         </div>
      </a>
    </div>
      </div>
    
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">  
    
  <li>
        <a href="{{route("admin.dashboard")}}">
          <i data-feather="pie-chart"></i>
    <span>Dashboard</span>
        </a>
      </li>  

      @php 
      $admin = App\Models\Admin::where("id",Session("ADMIN_ID"))->get();
      @endphp
  
     @if ($admin[0]->categories==1)
      <li class="treeview">
        <a href="#">
          <i class="ti-menu-alt"></i>
          <span>Category</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route("all.category")}}"><i class="ti-more"></i>Categories</a></li>
          <li><a href="{{route("all.subcategory")}}"><i class="ti-more"></i>Sub Category</a></li>
          <li><a href="{{route("all.subsubcategory")}}"><i class="ti-more"></i>Sub Sub Category</a></li>
        </ul>
      </li> 
      @else
      @endif
      @if ($admin[0]->brands==1)
      <li>
        <a href="{{route("all.brand")}}">
          <i data-feather="mail"></i> <span>Brand</span></a>
      </li>
      @else
      @endif
      <li>
        <a href="{{route("pickupcenter.view")}}">
          <i data-feather="mail"></i> <span>Pickup Center</span></a>
      </li>
      @if ($admin[0]->sliders==1)
      <li>
        <a href="{{route("manage-slider")}}">
          <i data-feather="server"></i> <span>Slider</span></a>
      </li>
      @else
      @endif
      @if ($admin[0]->products==1)
      <li class="treeview">
        <a href="#">
          <i data-feather="package"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route("manage-product")}}"><i class="ti-more"></i>Manage Product</a></li>
          <li><a href="{{route("add.product")}}"><i class="ti-more"></i>Add Product</a></li>
          <li><a href="{{route("stock.product")}}"><i class="ti-more"></i>Product Stock</a></li>
        </ul>
      </li>
      @else
      @endif
      @if ($admin[0]->orders==1)
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cart-plus"></i>
          <span>Orders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route("pending.order")}}"><i class="ti-more"></i>Pending Orders</a></li>
          <li><a href="{{route("confirmed.order")}}"><i class="ti-more"></i>Confirmed Orders</a></li>
          <li><a href="{{route("processing.orders")}}"><i class="ti-more"></i>Processing Orders</a></li>
          <li><a href="{{route("picked.orders")}}"><i class="ti-more"></i>Picked Orders</a></li>
          <li><a href="{{route("shipped.orders")}}"><i class="ti-more"></i>Shipped Orders</a></li>
          <li><a href="{{route("delivered.orders")}}"><i class="ti-more"></i>Delivered Orders</a></li>
          <li><a href="{{route("cancel.orders")}}"><i class="ti-more"></i>Cancel Orders</a></li>

        </ul>
      </li> 
      @else 
      @endif	
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cart-plus"></i>
          <span>Refer & Earn</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route("view.refers")}}"><i class="ti-more"></i>View Refers</a></li>
          <li><a href="{{route("view.due.payment")}}"><i class="ti-more"></i>Pay Referers</a></li>

        </ul>
      </li> 


      @if ($admin[0]->orders==1)
      <li class="treeview">
        <a href="#">
          <i class="ti-settings"></i>
          <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route("setting.site")}}"><i class="ti-more"></i>Site Settings</a></li>
          <li><a href="{{route("setting.seo")}}"><i class="ti-more"></i>SEO Settings</a></li>
        </ul>
      </li> 	
      @else 
      @endif
      @if($admin[0]->returnorders == 1)
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cart-arrow-down"></i>
          <span>Return Orders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route("return.request")}}"><i class="ti-more"></i>Return Requests</a></li>
          <li><a href="{{route("return.all")}}"><i class="ti-more"></i>Return Approved</a></li>
        </ul>
      </li> 
      @endif
      @if($admin[0]->allusers == 1)
      <li>
        <a href="{{route("get.all.users")}}">
          <i class="fa fa-users"></i> <span>View Users</span></a>
      </li>	
      @endif
      @if($admin[0]->manage_admins==1)
      <li>
        <a href="{{route("all.admin.user")}}">
          <i class="fa fa-user-md"></i> <span>Add Admin</span></a>
      </li>	 	
      @endif
      <li>
        <a href="{{route("admin.profile.view")}}">
          <i class="fa fa-user"></i> <span>Profile</span></a>
      </li>	   
      <li>
        <a href="{{route("admin.change.password")}}">
          <i class="fa fa-key"></i> <span>Change Password</span></a>
      </li>	 		  
      <li class="header nav-small-cap">User Interface</li>
    
      
    
  <li>
        <a href="{{route("admin.logout")}}">
          <i data-feather="lock"></i>
    <span>Log Out</span>
        </a>
      </li> 
      
    </ul>
  </section>

<div class="sidebar-footer">
  <!-- item-->
  <a href="{{route("setting.site")}}" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
  <!-- item-->
  <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
  <!-- item-->
  <a href="{{route("admin.logout")}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div>
</aside>