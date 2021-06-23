<?php 
    if (!isset($_SESSION)) { session_start(); }
?> 
<header>
    <div class="container">
        <h1>Smart Home App</h1>
        <div class="container" id="login">
            
            <h4 style="color: #ffffff;">Sie sind eingeloggt als '<?php echo htmlspecialchars($_SESSION['username']) ?>'<br></h4>

            <div class="btn btn-lg btn-primary" id="log_btn">
                <a href="./inc/logout.inc.php">Ausloggen</a>
            </div>
        </div>
    </div>
</header>
