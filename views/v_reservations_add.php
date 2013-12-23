<form method='POST' action='/reservations/p_add'>

	<table class="resv">
		<tr>

			<?php
if (isset($error)) {
    echo " Error: Complete all the fields and try again.";
}
?>
			<td width="200px">
				<div id="errors">
					<div id="firstNameErrorDiv" class="error">Please enter valid
						first name.</div>
					<div id="lastNameErrorDiv" class="error">Please enter valid
						last name.</div>
					<div id="doffErrorDiv" class="error">Please enter valid
						dropoff location.</div>
					<div id="pickErrorDiv" class="error">Please enter valid
						pickup location.</div>
					<div id="ccErrorDiv" class="error">Please enter valid credit
						card number.</div>
				</div> <br /> <br /> <label>First Name:</label><br /> <input
				id="firstName" name='first_name' type="text"
				placeholder="First Name" value="<?php echo $user->first_name ;?>">
				<br /> <label>Last Name:</label><br /> <input id="lastName"
				name='last_name' type="text" placeholder="Last Name"
				value="<?php echo $user->last_name ;?>"><br /> <label>Pickup
					Time:</label><br /> <input id="pickupTime" name='pickup_time' type="text"
				placeholder="Pickup time"
				value="<?php $dt = new DateTime();echo $dt->format('m/d/Y h:i A');?>"><br />

				<label>Pickup:</label><br /> <input id="pickupLocation"
				name='pickup_location' type="text" placeholder="Pickup Location"><br />

				<label>Dropoff:</label><br /> <input id="dropoffLocation"
				name='dropoff_location' type="text" placeholder="Dropoff Location"><br />

				<label>Vehicle Type</label><br /> <select id="type"
				name='vehicle_type'>
					<option label="Sedan" value="Sedan">Sedan</option>
					<option label="SUV" value="SUV">SUV</option>
					<option label="Van" value="Van">Van</option>
					<option label="Limo" value="Limo">Limo</option>
			</select>

				<div id="paymentDiv">

					<label>Payment Type</label><br /> <select id="ptype"
						name='payment_type' onchange="pTypeChanged(this.value);">
						<option label="Cash" value="Cash">Cash</option>
						<option label="Credit Card" value="CreditCard">CreditCard</option>
					</select><br />
				</div>
				<div id="cCredit">
					<div>

						<label>Name on card</label><br /> <input type="text"
							value="<?php echo $user->first_name ;?> <?php echo $user->last_name ;?>">
						<br /> <label>Card Type</label><br /> <select><option
								value="1">VISA</option>
							<option value="2">MasterCard</option>
							<option value="3">AMEX</option>
							<option value="4">Discover</option>
							<option value="5">JCB</option>
						</select> <br />
						<label class="input-label">Card Number</label> <br /> 
						<input
							id="cCard" maxlength="16" type="text"
							value="" /> <br /> 

							<label class="input-label">Exp Month</label>
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select> <label>Exp Year</label> <select>
							<option>2014</option>
							<option>2015</option>
							<option>2016</option>
							<option>2017</option>
							<option>2018</option>
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
						</select>
					</div>

				</div> <br /> <br />
			<br />
			<br /> <input id="getRate" type="button" value="Get Rate" /><br />
			<br /> <input id="submitRes" type="submit" value="Make Reservation" />
				<br /> <br /></td>
			<td width="200px"><br /> <br />
				<div id="drivingDistance">
					<label>Driving Distance (Miles)</label> <br /> <input
						id="driving_distance" readonly>
				</div>

				<div id="drivingDistanceKm">
					<label>Driving Distance (Km)</label><br /> <input
						id="driving_distance_km" readonly>
				</div>

				<div id="totalDiv">
					<label>Estimated Total ($)</label><br /> <input
						name="total_amount" id="total_amount" readonly>
				</div> <br />
			<br /></td>
		<tr>
	</table>
</form>

<script>
	jQuery('#totalDiv').hide();
	jQuery('#drivingDistance').hide();
	jQuery('#drivingDistanceKm').hide()
	jQuery('#submitRes').hide();
	jQuery('#firstNameErrorDiv').hide();
	jQuery('#lastNameErrorDiv').hide();
	jQuery('#pickErrorDiv').hide();
	jQuery('#doffErrorDiv').hide();
	jQuery('#cCredit').hide();
	jQuery('#ccErrorDiv').hide();

	jQuery('#getRate').on('click', function() {
		validate();
		calculateRate();		
		if (hasErrors != true) {
			jQuery('#totalDiv').fadeIn();
			jQuery('#drivingDistance').fadeIn();
			jQuery('#drivingDistanceKm').fadeIn()
			jQuery('#submitRes').fadeIn();
			jQuery('#paymentDiv').fadeIn();
		}
	});
</script>

