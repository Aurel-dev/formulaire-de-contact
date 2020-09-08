<?php

    $firstname = $name = $email = $phone = $message = "";
    $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = verifyInput($_POST["firstname"]);
        $name = verifyInput($_POST["name"]);
        $email = verifyInput($_POST["email"]);
        $phone = verifyInput($_POST["phone"]);
        $message = verifyInput($_POST["message"]);

        if(empty($firstname))
        {
            $firstnameError = "Je souhaite connaître ton prénom !";
        }
            
        if(empty($name))
        {
            $nameError = "Je souhaite connaître ton nom !";
        }

        if(empty($message))
        {
            $messageError = "Dis-moi tout !";
        }

        if(!isEmail($email)) //en rapport avec la fonction isEmail
        {
            $emailError = " Adresse-mail invalide ";
        }

        if(!isPhone($phone)) //en rapport avec la fonction isPhone
        {
            $phoneError = " Que des chiffres et des espaces stp ...";
        }

    }

    function isPhone($var)
    {
        return preg_match("/^[0-9 ]*$/", $var);
    }

    function isEmail($var)
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL); //renvoie true or false
    }

    function verifyInput($var)
    { // partie securite
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contactez-moi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <link href="http://font.googleapis.com/css?family=lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Contactez-moi !</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-lg-offset-1">
                <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form"> 
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname">Prénom <span class="blue">*</span></label>
                                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">
                                <p class="comments"><?php echo $firstnameError ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Nom <span class="blue">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="<?php echo $name; ?>">
                                <p class="comments"><?php echo $nameError ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email <span class="blue">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $email; ?>">
                                <p class="comments"><?php echo $emailError ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Téléphone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre téléphone" value="<?php echo $phone; ?>">
                                <p class="comments"><?php echo $phoneError ?></p>
                            </div>
                            <div class="col-md-12">
                                <label for="message">Message <span class="blue">*</span></label>
                                <input type="text" id="message" name="message" class="form-control" placeholder="Votre message" value="<?php echo $message; ?>">
                                <p class="comments"><?php echo $messageError ?></p>
                            </div>
                            <div class="col-md-12">
                                <p class="blue"><strong>* Ces informations sont requises</strong> </p>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="button1" value="Envoyer">
                            </div>
                        </div>

                        <p class="thank-you">Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>
                </form> 
                </div>
            </div>
        </div>
    </body>
</html>