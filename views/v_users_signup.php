
<h2> This is Signup Page </h2>
   
<form method='POST' action='/users/p_signup'>

    First Name<br>
    <input type='text' name='first_name'>
    <br><br>

    Last Name<br>
    <input type='text' name='last_name'>
    <br><br>

    Email<br>
    <input type='text' name='email'>
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>


<?php if(isset($error)): ?>
        <div>
            Error: Complete all the fields and try again.
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='sign up' >   


</form>
