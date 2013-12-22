
<form method='POST' action='/users/p_profile'>

	<input type="hidden" name="user_id" value=<?=$user->user_id?>>
	First Name <br>
     <input type='text' name='first_name' value = <?=$user->first_name?>>
    <br><br>

    Last Name <br> 
    <input type='text' name='last_name'value = <?=$user->last_name?>>
    <br><br>

    Email <br>
    <input type='text' name='email' value = <?=$user->email?>>
    <br><br>

    Password <br>
    <input type='password' name='password'>
    
    <br>
    
    <?php if(isset($error)): ?>
    <div>
          Error: Complete all the fields and try again.
    <div>
    <?php endif; ?>


    <input type='submit' value='Submit'>

</form>
 