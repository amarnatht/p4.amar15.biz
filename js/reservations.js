     

    var geocoder, location1, location2, gDir,hasErrors=false, paymentType;

    function calculateRate() {
    	geocoder = new GClientGeocoder();
        gDir = new GDirections();
        GEvent.addListener(gDir, "load", function() {
            var drivingDistanceMiles = gDir.getDistance().meters / 1609.344;
            var drivingDistanceKilometers = gDir.getDistance().meters / 1000;
            $('#driving_distance').val(drivingDistanceMiles.toFixed(2));
            $('#driving_distance_km').val(drivingDistanceKilometers.toFixed(2));
      	  $('#total_amount').val((drivingDistanceMiles * 9.99).toFixed(2));
        });
        geocoder.getLocations(document.getElementById("pickupLocation").value, function (response) {
            if (!response || response.Status.code != 200)
            {
            	jQuery('#pickErrorDiv').fadeIn();
            	hasErrors = true;
				//alert(hasErrors);
            }
            else
            {
            	jQuery('#pickErrorDiv').hide();
            	hasErrors = false;
                location1 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
                geocoder.getLocations(document.getElementById("dropoffLocation").value, function (response) {
                    if (!response || response.Status.code != 200)
                    {
                        jQuery('#doffErrorDiv').fadeIn();
                        hasErrors = true;
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

function pTypeChanged(id) {
	if(id == 'CreditCard') {
		jQuery('#cCredit').fadeIn();
		paymentType ="CC";
	} else {
		jQuery('#cCredit').hide();
	}
}

function validate() {
	if(jQuery.isEmptyObject(jQuery('#firstName').val())) {
		jQuery('#firstNameErrorDiv').fadeIn();
		hasErrors = true;
	}

		if(jQuery.isEmptyObject(jQuery('#lastName').val())) {
		jQuery('#lastNameErrorDiv').fadeIn();
		hasErrors = true;
	}


	if(jQuery.isEmptyObject(jQuery('#pickupLocation').val())) {
		jQuery('#pickErrorDiv').fadeIn();
		hasErrors = true;
	}

		if(jQuery.isEmptyObject(jQuery('#dropoffLocation').val())) {
		jQuery('#doffErrorDiv').fadeIn();
		hasErrors = true;
	}

	if(paymentType == "CC") {
		var str = $('#cCard').val();
		var numberRegex = /\d{16}/;
		if( jQuery.isEmptyObject(str) || !numberRegex.test(str)) {
		jQuery('#ccErrorDiv').fadeIn();
		hasErrors = true;
		} else {
			jQuery('#ccErrorDiv').fadeOut();
		
		}
	} 

	



}

