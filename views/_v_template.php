<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- This is CSS  App CSS file -->
    <link rel="stylesheet" type="text/css" href="/css/appcss.css">
		
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7j_Q-rshuWkc8HyFI4V2HxQYPm-xtd00hTQOC0OXpAMO40FHAxT29dNBGfxqMPq5zwdeiDSHEPL89A" type="text/javascript"></script>
		<script src="/js/reservations.js"></script>

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>

</head>
<body id='lpage'>
<br>
    <div id='menu'>
<ul>
        <li><a href='/'>Home</a></li>

        <!-- Menu for users who are logged in -->
        <?php if($user): ?>


           <li> <a href='/reservations/add'>Make New Reservation</a> </li>
            <li><a href='/reservations/reservations'>All Reservations</a> </li>
            <li><a href='/users/profile'>Edit Member Profile</a> </li>
            <li><a href='/users/logout'>Logout</a> </li>

        <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <li><a href='/users/signup'>Sign up</a> </li>
            <li><a href='/users/login'>Log in</a> </li>


        <?php endif; ?>
</ul>
    </div>

    <br>

<div id= 'talign'>
    <?php if(isset($content)) echo $content; ?>
</div>
</body>


</html>