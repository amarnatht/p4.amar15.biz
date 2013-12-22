<h2> Your Reservations </h2>
<table>

<tr>
						<th>Res#</th>

						<th>Date/Time</th>
						<th>Pickup</th>
						<th>Dropoff</th>
						<th>Vehicle Type</th>
						<th>Payment Type</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
<?php foreach($reservations as $reservation): ?>
<tr>
<td>
    <?=$reservation['reservation_id']?>
</td>

<td>
	<?php $timestamp = strtotime($reservation['pickup_time']);
	echo date("m/d/Y h:i A", $timestamp);?>

</td>
<td>
    <?=$reservation['pickup_location']?>
</td>
<td>
    <?=$reservation['dropoff_location']?>
</td>
<td>
    <?=$reservation['vehicle_type']?>
</td>
<td>
    <?=$reservation['payment_type']?>
</td>
<td>
    <?=$reservation['total_amount']?>
</td>
<td>
	<a href='/reservations/open/<?=$reservation['reservation_id']?>'>open</a>
</td>
</tr>


<?php endforeach; ?>

</table>