

<table>
<br><br>
<?php foreach($reservations as $post): ?>

<tbody>
	<tr>



	<label><b>First Name:</b></label>
   	<?=$post['first_name']?>
</tr><br/><br/>

	<tr>
    <label><b>Last Name:</b></label>
   	<?=$post['last_name']?>
<tr><br/><br/>
	<tr>
	<label><b>Pickup Time:</b></label>

<?php $timestamp = strtotime($post['pickup_time']);
	echo date("m/d/Y h:i A", $timestamp);?>

	</tr><br/><br/>
	<tr>
	<label><b>Pickup:</b></label>
	<?=$post['pickup_location']?>
</tr><br/><br/>
	<tr>
	<label><b>Dropoff:</b></label>
	<?=$post['dropoff_location']?>
	</tr><br/><br/>

	<tr>
	<label><b>Vehicle Type:</b></label>
	<?=$post['vehicle_type']?>
</tr><br/><br/>
	<tr>
	<label><b>Payment Type:</b></label>
	<?=$post['payment_type']?>
</tr><br/><br/>
		<tr>
	<label><b>Total Amount :</b></label>
	$<?=$post['total_amount']?>
</tr><br/><br/>


    	<input type="button" value="Back To List" onClick="document.location.href='/reservations/reservations';" />




<hr>

<?php endforeach; ?>
<tbody>

</table>