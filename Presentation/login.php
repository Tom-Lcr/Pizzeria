<?php declare(strict_types=1); 
?> 
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8> 
        <title>Pizzeria - login</title> 
    </head>
    <body>
            <h1>Pizzeria</h1>
            <div class="my-5">
                <form action="./login.php?action=process" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">email: </label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-5">
                        <label for="wachtwoord" class="form-label">wachtwoord: </label>
                        <input type="password" class="form-control" name="wachtwoord" id="wachtwoord">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
        <?php
          if($error){
        ?>                  
                    <p class="text-danger"><?php echo $error; ?></p>

        <?php
          }
        ?>                  
    
            </div>
    </body>
</html>
