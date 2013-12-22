
<h1>Welcome to <?=APP_NAME?>
    <?php if($user) :?>
        <?php echo ' , ' .$user->first_name .': Book your chauffeur service.';?>
    <?php endif ?>
</h1>

<h2> This is  Auto Taxi  Reservation system </h2>

<p> This is part of Amar's Final Project portal for CSCI E-15 . Initially Customer will resgister or sign up with 
	personal information . Then customer will login into Amar's Portal. After login customer will provide required 
	information including source and destination locations. Based on information provided application will calculate 
	the miles and kilo meters using Google provided API. Also it will calculate Total Amount in Dollars. Amount per 
	mile is hard coded in programe.</p>

<p><?=APP_NAME?> is a blog where people can reserve a chauffeur service.</p>

