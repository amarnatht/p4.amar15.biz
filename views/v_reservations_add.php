<form method='POST' action='/reservations/p_add'>

<?php
if (isset($error)) {
    echo " Error: Complete all the fields and try again.";
}
?>
  <div id="doffErrorDiv"> Please enter valid dropoff location.</div>
  <div id="pickErrorDiv"> Please enter valid pickup location.</div>

   <br/><br/>

    <label>First Name:</label><br/>
   	<input id="firstName" name='first_name' type="text" placeholder="First Name" value="<?php echo $user->first_name ;?>">	<br/>

    <label>Last Name:</label><br/>
   	<input id="lastName" name='last_name' type="text" placeholder="Last Name" value="<?php echo $user->last_name ;?>"><br/>

	<label>Pickup Time:</label><br/>
	<input id="pickupTime" name='pickup_time' type="text" placeholder="Pickup time" value="<?php
$dt = new DateTime();
echo $dt->format('m/d/Y h:i A');
?>"><br/>

	<label>Pickup:</label><br/>
	<input id="pickupLocation" name='pickup_location' type="text" placeholder="Pickup Location"><br/>

	<label>Dropoff:</label><br/>
	<input id="dropoffLocation" name='dropoff_location' type="text" placeholder="Dropoff Location"><br/>

	<label>Vehicle Type</label><br/>
	<select id="type" name='vehicle_type'>
		<option label="Sedan" value="Sedan">Sedan</option>
		<option label="SUV" value="SUV">SUV</option>
		<option label="Van" value="Van">Van</option>
		<option label="Limo" value="Limo">Limo</option>
	</select><br/>

	<label>Payment Type</label><br/>
	<select id="ptype" name='payment_type'>
		<option label="Cash" value="Cash">Cash</option>
		<option label="Credit Card" value="CreditCard">CreditCard</option>
	</select><br/>
	<br><br>

<?php if(!isset($error)): ?>

			<div id="drivingDistance">
  				  	<label>Driving Distance (Miles)</label>
						<input id="driving_distance" readonly>
  				</div>

    				 <div id="drivingDistanceKm">
  				  	<label>Driving Distance (Km)</label>
						<input  id="driving_distance_km" readonly>
  				</div>

		<div id="totalDiv" >
			<label>Estimated Total ($)</label>
			<input class="span4" name="total_amount" id="total_amount" readonly>
		</div>

 <?php endif; ?>
			<input id="getRate" type="button" value="Get Rate">
			<input id="submitRes" type="submit" value="Submit">

</form>

<script>
		    jQuery('#totalDiv').hide();
		     jQuery('#drivingDistance').hide();
		     jQuery('#drivingDistanceKm').hide()
		    jQuery('#submitRes').hide();
			jQuery('#firstErrorDiv').hide();
			jQuery('#lastErrorDiv').hide();
			jQuery('#pickErrorDiv').hide();
			jQuery('#doffErrorDiv').hide();
           // jQuery('#lastName').keyup(validate);

        	jQuery('#getRate').on('click', function () {
        		initialize();
        		showLocation();
        	 	jQuery('#totalDiv').fadeIn();
        	 	 jQuery('#drivingDistance').fadeIn();
        	 	 jQuery('#drivingDistanceKm').fadeIn()
        		jQuery('#submitRes').fadeIn();
        	});



    var geocoder, location1, location2, gDir;

    function initialize() {
        geocoder = new GClientGeocoder();
        gDir = new GDirections();
        GEvent.addListener(gDir, "load", function() {
            var drivingDistanceMiles = gDir.getDistance().meters / 1609.344;
            var drivingDistanceKilometers = gDir.getDistance().meters / 1000;
            $('#driving_distance').val(drivingDistanceMiles.toFixed(2));
            $('#driving_distance_km').val(drivingDistanceKilometers.toFixed(2));
      	  $('#total_amount').val((drivingDistanceMiles * 9.99).toFixed(2));
        });
    }

    function showLocation() {
        geocoder.getLocations(document.getElementById("pickupLocation").value, function (response) {
            if (!response || response.Status.code != 200)
            {
            	jQuery('#pickErrorDiv').fadeIn();
                //alert("Sorry, we were unable to find the pickup location");
            }
            else
            {
            	jQuery('#pickErrorDiv').hide();
                location1 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
                geocoder.getLocations(document.getElementById("dropoffLocation").value, function (response) {
                    if (!response || response.Status.code != 200)
                    {
                        //alert("Sorry, we were unable to find the dropoff location");
                        jQuery('#doffErrorDiv').fadeIn();
                    }
                    else
                    {
                    	jQuery('#doffErrorDiv').hide();
                        location2 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
                        gDir.load('from: ' + location1.address + ' to: ' + location2.address);
                    }
                });
            }
        });
    }

function validate() {
	if(jQuery.isEmptyObject(jQuery('#firstName').val())) {
		jQuery('#firstErrorDiv').fadeIn();
	}

		if(jQuery.isEmptyObject(jQuery('#lastName').val())) {
		jQuery('#lastErrorDiv').fadeIn();
	}
}


		</script>

