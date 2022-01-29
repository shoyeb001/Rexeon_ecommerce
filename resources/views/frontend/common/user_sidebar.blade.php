@php

    $id = session("USER_ID");
    $user = App\Models\User::find($id);

@endphp


<div class="col-md-2"><br> 
				<img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%"><br><br>
				
				<ul class="list-group list-group-flush">
<a href="{{route("frontend.index")}}" class="btn btn-primary btn-sm btn-block">Home</a>

<a href="{{route("user.profile")}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>

<a href="{{route("change.password")}}" class="btn btn-primary btn-sm btn-block">Change Password </a>

<a href="{{route("user.myorder")}}" class="btn btn-primary btn-sm btn-block">My Orders</a>

<a href="{{route("return.order.list")}}" class="btn btn-primary btn-sm btn-block">Return Orders</a>

<a href="{{route("user.cancel.orders")}}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>

@if (session("USER_REFER")!=NULL)
<a href="{{route("refer.share")}}" class="btn btn-primary btn-sm btn-block">Refer Link</a>
<a href="{{route("user.refer.insight")}}" class="btn btn-primary btn-sm btn-block">Refers</a>
<a href="{{route("user.refer.payment")}}" class="btn btn-primary btn-sm btn-block">Payment Details</a>

	
@endif

<a href="{{route("user.logout")}}" class="btn btn-danger btn-sm btn-block">Logout</a>
					
				</ul>
				
			</div> <!-- // end col md 2 -->