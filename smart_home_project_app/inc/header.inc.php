<?php  
    if (!isset($_SESSION)) { session_start(); }
    
    $err_msg = '';
    $username = '';
    $passwort = '';
    
    $current_time = time();
    $cookie_expiration_time = $current_time + (10 * 60);
            
    if (isset($_POST['login']) && !empty($_POST['username']) 
    && !empty($_POST['passwort'])) 
    {			
        if ($_POST['username'] == 'admin' && 
        $_POST['passwort'] == '1234') 
        {
            if (!empty($_POST["remember"]))
            {
                setcookie("member_login", true, $cookie_expiration_time);
                setcookie("passwort", true, $cookie_expiration_time);
            }
            
            $_SESSION['loggedin'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'admin';
            $_SESSION['zimmerliste'] = array();

            header("location: ./index.php");
        }
        else 
        {
            $err_msg = 'Error: Bitte überprüfen Sie Ihre Zugangsdaten!';
        }
    }
?>  
<header>
    <div class="container">
        <h1>Smart Home App</h1>
        <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="container" id="login">
                <h4 class = "form-signin-heading"><?php echo $err_msg; ?></h4>
                <label for=”username”>Username:</label>
                <input class = "form-control" type="text"
                    name="username" minlength="2" maxlength="12" required><br></input>
                
                <label for=”passwort”>Passwort:</label>
                <input class = "form-control" type="password"
                    name="passwort" minlength="2" maxlength="12" required><br></input>
                
                <label class="container2" for="remember">Angemeldet bleiben
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember"
                    <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> >
                    <span class="checkmark"></span>
		</label>
                
                <button class = "btn btn-lg btn-primary btn-block" type="submit" name = "login">Einloggen</button>
            </div>
        </form>
    </div>
</header>

