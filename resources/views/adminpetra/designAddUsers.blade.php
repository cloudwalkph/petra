@extends('adminpetra.AdminDashboard')
@section('dashboardContent')

<head>
	<link href="bootstrap-3.3.7-dist\css\bootstrap.min.css" rel="stylesheet">
	<script href="bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery-3.1.1.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Add Users</title>
	<style type="text/css">
		.inp
		{
			position: absolute;
			width: 20%;
			height: 5%;
		}
		.btn-file {
			position: relative;
			overflow: hidden;
		}
		.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
		}

		#img-upload{
			width: 100%;
		}


		.container{
			margin-top:20px;
		}
		.image-preview-input {
			position: relative;
			overflow: hidden;
			margin: 0px;    
			color: #333;
			background-color: #fff;
			border-color: #ccc;    
		}
		.image-preview-input input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
		.image-preview-input-title {
			margin-left:2px;
		}
		#mom{
			display: table;
			width: 10%;
		}
		.baby
		{
			display: table-cell;
		}
	</style>
</head>
<body>
	<form action="/user" enctype="multipart/form-data" role="form" class="form-horizontal" method="POST">
		{{ csrf_field() }}
<!-- 		<div>
			<div style="font-size: 25px">Member List</div>
			<input type="Button" name="add" id="add" value="Add Member"><input type="text" name="search" id="search">	
		</div> -->
		<div style="font-size: 25px">Member List</div>

		<div class="row" id="mom">
			<!-- Trigger the modal with a button -->
			<div class="baby"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Member</button></div>
			<div class="baby"><input type="text" name="search" id="search" placeholder="search" class="form-control form-rounded" style="width: 150px"></div>
			<div class="baby">
				<button class="btn btn-default" type="button" id = "btnSearch" >
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>
			
			

		</div>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Member</h4>
					</div>

					<div class="modal-body">
						<!--start-->
						<div>
							<div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }}">
								<label for="profile_picture" class="col-md-4 control-label">Profile Picture</label><br><br>

								<div class="col-md-6">
									<script type="text/javascript" language="javascript" src="js\uploadImage.js"></script>
									<!--input id="profile_picture" type="profile_picture" class="form-control" name="profile_picture" value="{{ old('profile_picture') }}" required -->

									<div class="input-group image-preview">
										<input id="profile_picture" type="profile_picture" class="form-control image-preview-filename"
										name="profile_picture" value="" disabled="disabled"> 
										<!-- don't give a name === doesn't send on POST/GET -->
										<span class="input-group-btn">
											<!-- image-preview-clear button -->
											<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
												<i class="fa fa-trash" aria-hidden="true"></i> Clear
											</button>
											<!-- image-preview-input -->
											<div class="btn btn-default image-preview-input">
												<i class="fa fa-folder-open" aria-hidden="true"></i>
												<span class="image-preview-input-title">Browse</span>
												<input type="file" accept="image/png, image/jpeg, image/gif" name="profile_picture"/>
												<!-- rename it -->
											</div>
										</span>
									</div><!-- /input-group image-preview [TO HERE]-->


								</div><br><br>	

							</div>
							<input type="text" name="fname" id="fname" placeholder="First Name" class="inp form-control form-rounded" style="width: 250px"><br><br>
							<input type="text" name="mname" id="mname" placeholder="Middle Name" class="inp form-control form-rounded" style="width: 250px"><br><br>
							<input type="text" name="lname" id="lname" placeholder="Last Name" class="inp form-control form-rounded" style="width: 250px"><br><br>

							<div class="inp">
								<select style="width: 250px" class="combobox form-control" id="position" type="position" name="position" 
								value="{{ old('position') }}" required>
								<option selected disabled>Position
									<!-- <option selected disabled>Position</option> -->
									<option value="Developer">Developer</option>
									<option value="Designer">Designer</option>
									<option value="Sales">Sales</option>
									<option value="Admin">Admin</option>
									<option value="Project Man">Project Man</option>
								</option>

							</select>
							<script type="text/javascript">
								$(document).ready(function(){
									$('.combobox').combobox();
								});
							</script>
						</div><br><br>

						<div class="inp">
							<select style="width: 250px" class="combobox form-control" id="User_type" type="User_type" name="User_type" 
							value="{{ old('User_type') }}" required>
							<option selected disabled>User Type
								<!-- <option selected disabled>Position</option> -->
								<option value="Admin">Admin</option>
								<option value="Employee">Employee</option>
							</option>
						</select>
						<script type="text/javascript">
							$(document).ready(function(){
								$('.combobox').combobox();
							});
						</script>
					</div><br><br>

					<div> Gender: Male: 
						<input type="radio" name="gender" id="gender" value="male"> Female: 
						<input type="radio" name="gender" id="gender" value="female">	
					</div>

					<input style="width: 250px" type="text" name="email" id="email" placeholder="E-mail address" class="inp form-control form-rounded"><br><br>
					<input style="width: 250px" type="Password" name="password" id="password" placeholder="Password" class="inp form-control form-rounded"><br><br>
					<!-- <input style="width: 250px" type="Password" name="cnfrm" id="cnfrm" placeholder="Confirm Password" class="inp form-control form-rounded"><br><br> -->
					<!-- <input type="submit" name="register" id="register" value="Register" class="btn btn-default"> -->

				</div>
				<!--end of body -->

				<div class="modal-footer">
					<input type="submit" class="btn btn-default" name="add" id="add" value="Add">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Photo</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Account Type</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($userprofiles as $userprofile)
			<tr>
				<td><img src="{{ $userprofile->profile_picture }}" class="user-image" alt="User Image"> </td>
				<td>{{ $userprofile->first_name }} </td>
				<td>{{ $userprofile->last_name }}</td>
				<td>{{ $userprofile->position }}</td>
				<td><a href="#"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a></td>


				</tr>
				@endforeach
			</tbody>
		</table>
	</div>  
</form>
</body>
@endsection