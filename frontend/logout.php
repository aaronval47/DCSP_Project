<!DOCTYPE html>
<html>
    <head>
        <title>Logged Out</title>
    </head>
    <?php
       // start the session
        session_start();

        // destroy session
        session_unset();
        session_destroy();
        
    ?> 
    <body>
        <h1>Logged Out</h1>
        <p>
            You are now logged out of the website.
        </p>
        <p>
            <a href="login_page.php">Log in</a> again.
        </p>
    </body>
</html>