<!DOCTYPE html>
<html>
<head>
    <title>User Import task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
    	.flash {
		  -webkit-animation-name: flash;
		  animation-name: flash;
		}
		.red{
			background-color: red;
		}
    </style>
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            User Import from CSV
        </div>
        <div class="card-body">
            <form action="{{ route('user-list.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required> 
                <br>
                <button class="btn btn-success" name="import_new_data" value="1">Import User Data</button>
                <a class="btn btn-primary" href="{{ route('export') }}">Export User Data</a>
                <button class="btn btn-warning" name="import_new_data" value="2">Update User Data</button>

            </form>
        </div>
    </div>
</div>
 <div class="container">
 	<div class="table table-responsive">
 		<table class="table table-bordered table-stripped">
 			<thead>
 				<th>Id</th>
 				<th>Name</th>
 				<th>Email</th>
 				<th>Age</th>
 				<th>Details</th>
 				<th>phone</th>
 				<th>designation</th>
 				<th>address</th>
 				<th>country</th>
 				<th>salary</th>
 				<th>status</th>
 			</thead>
 			<tbody>
 				<?php
 					
 					$userOldData = [];
 					if(Session::has('userOldData')){
 						$userOldData = Session::get('userOldData');
 					}
 					
 				?>
 				@forelse($userData as $key => $user)

 					<tr>
 						<td>{{ $user->id }}</td>

 						<td {{($userOldData[$key]->name != $user->name) ? "class=red":"class=transparent"}}  >{{ $user->name }}</td>

 						<td {{($userOldData[$key]->email != $user->email) ? "class=red":"class=transparent"}}>{{ $user->email }}</td>

 						<td {{($userOldData[$key]->age != $user->age) ? "class=red":"class=transparent"}}>{{ $user->age }}</td>

 						<td {{($userOldData[$key]->details != $user->details) ? "class=red":"class=transparent"}}>{{ $user->details }}</td>

 						<td {{($userOldData[$key]->phone != $user->phone) ? "class=red":"class=transparent"}}>{{ $user->phone }}</td>

 						<td {{($userOldData[$key]->designation != $user->designation) ? "class=red":"class=transparent"}}>{{ $user->designation }}</td>

 						<td {{($userOldData[$key]->address != $user->address) ? "class=red":"class=transparent"}}>{{ $user->address }}</td>

 						<td {{($userOldData[$key]->country != $user->country) ? "class=red":"class=transparent"}}>{{ $user->country }}</td>

 						<td {{($userOldData[$key]->salary != $user->salary) ? "class=red":"class=transparent"}}>{{ $user->salary }}</td>

 						<td {{($userOldData[$key]->status != $user->status) ? "class=red":"class=transparent"}}>
 							<label class="label-success">{{$user->status}}</label>
 						</td>
 					</tr>
 				@empty
 				@endforelse
 			</tbody>
 		</table>
 	</div>
 </div> 
</body>
</html>