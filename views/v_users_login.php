		
<form method='POST' action='/users/p_login'>

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

    <input type='submit' value='Log in' >
  <!--  <input type='submit' value='Log in'> -->

</form>