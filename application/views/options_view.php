<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://localhost/ci-crud/stylesheets/styles.css">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>
<body>
	<?php include('header.php');?>

	<h2 class="createTitle">Create User</h2>
	<?php echo form_open('crud/create_user');?>
	<div class="addForm container">

	    <form role="form" style="width:400px; margin: 0 auto;">
	        

	        <div class="required-field-block">
	            <input type="text" placeholder="Name" name='name' id='name' class="form-control">
	            <div class="required-icon">
	                <div class="text">*</div>
	            </div>
	        </div>


	        <div class="required-field-block">
	            <input type="text" placeholder="Nim" name='nim' id='nim' class="form-control">
	            <div class="required-icon">
	                <div class="text">*</div>
	            </div>
	        </div>
	        
	        <div class="required-field-block">
	            <input type="text" placeholder="Email" name='email' id='email' class="form-control">
	            <div class="required-icon">
	                <div class="text">*</div>
	            </div>
	        </div>

	         <div class="required-field-block">
	            <input type="text" placeholder="Jenis Kelamin" name='jenis_kelamin' id='jenis_kelamin' class="form-control">
	            <div class="required-icon">
	                <div class="text">*</div>
	            </div>
	        </div>

	        <div class="required-field-block">
	            <input type="text" placeholder="Phone Number" name='phone_number' id='phone_number' class="form-control">
	            <div class="required-icon">
	                <div class="text">*</div>
	            </div>
	        </div>

	        <div class="required-field-block">
	            <input type="text" placeholder="Alamat Lengkap" name='alamat' id='alamat' class="form-control">
	            <div class="required-icon">
	                <div class="text">*</div>
	            </div>
	        </div>

	        <div class="required-field-block">
	            <input type="text" placeholder="Roles" name='assoc_roles' id='assoc_roles' class="form-control">
	            <div class="required-icon">
	                <div class="text">*</div>
	            </div>
	        </div>
	        
	        <button type="submit" value="submit" class="submit create btn btn-primary">add User</button>
	    </form>
	</div>

	<?php echo form_close(); ?>

	<h2 class="usersTitle">Users</h2>

	<table class="table">
		<thead class="tableHead">
			<th>Name</th>
			<th>Nim</th>
			<th>Email</th>
			<th>Jenis Kelamin</th>
			<th>Phone Number</th>
			<th>Alamat</th>
			<th>Roles</th>
			<th>Action</th>
		</thead>
		<tbody class="tableBody">
			<?php if(isset($users)) : foreach($users as $row) : ?>
				<tr>
					<td><?php echo anchor("crud/delete/$row->user_id", $row->name); ?></td>
					<td><?php echo $row->nim; ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->jenis_kelamin; ?></td>
					<td><?php echo $row->phone_number; ?></td>
					<td><?php echo $row->alamat; ?></td>
					<td><?php echo $row->assoc_roles; ?></td>
					<td>
						<a class="editButton btn btn-info" href="<?php echo base_url('index.php/crud/edit/'.$row->user_id); ?>">Edit</a>
						<a class="deleteButton btn btn-danger" href="<?php echo base_url('index.php/crud/delete/'.$row->user_id); ?>" onclick="return confirm('are your sure?')">Delete</a>
					</td>
				</tr>
			<?php endforeach ; ?>

			<?php else : ?>

			<h2>No records were returned</h2>

			<?php endif; ?>

		</tbody>
	</table>
<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.11.3.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript">
	$(function() {
    $('.required-icon').tooltip({
        placement: 'left',
        title: 'Required field'
        });
});
</script>
</body>
</html>