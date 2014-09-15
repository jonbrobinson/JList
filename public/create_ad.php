<? include('header.php'); ?>
<?php
	if(!empty($_POST))
	{
		function read_csv(){
			$ads = [];
			$handle = fopen('ads.csv', 'r');
			while(!feof($handle)){
            	$row = fgetcsv($handle);
	            if(is_array($row)){
	                $ads[] = $row;
	            }
        	}
        	fclose($handle);
        	return $ads;

		}

		function write_csv($array)
	    {
	    	$createdAt = date('D, d M Y');
	    	array_push($array,$createdAt);
	        $handle = fopen('ads.csv', 'a');
            fputcsv($handle,$array);
	        fclose($handle);
	    }

	   	$ads = read_csv();
	    $new_ad = write_csv($_POST);

	    array_push($ads, $new_ad);
	    header('location:ad_home.php');
	    exit;
	}
?>
<div class="container">
	<form role="form" method="POST">
		<div class="form-group">
			<label for="category">Category</label>
			<select name="category" class="form-control">
				<option value="Automotive">Automotive</option>
				<option value="Jobs">Jobs</option>
				<option value="Housing">Housing/Rental Properties</option>
				<option value="Dating">Dating</option>
				<option value="Deals">Deals</option>
			</select>
		</div>
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" name="tile" placeholder="Enter Title">
		</div>
		<div class="form-group">
			<label for="body">Body</label>
			<textarea type="text" class="form-control" name="body" rows="6" placeholder="Description of your ad"></textarea>
		</div>
		<div class="form-group">
			<label for="contact_name">Contact Name</label>
			<input type="text" class="form-control" name="contact_name" placeholder="Type Your Name Here">
		</div>
		<div class="form-group">
			<label for="contact_email">Email Address</label>
			<input type="email" class="form-control" name="contact_email" placeholder="Enter Email">
		</div>
		<a href="ad_home.php" class="btn btn-danger">Cancel</a>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

<? include('footer.php'); ?>