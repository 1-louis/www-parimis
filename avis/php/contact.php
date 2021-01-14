<?php

    $array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "","file"=>"", "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "fileError"=>'', "isSuccess" => false);
    $emailTo = "l.louis@outlook.fr";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $array["firstname"] = test_input($_POST["firstname"]);
        $array["name"] = test_input($_POST["name"]);
        $array["email"] = test_input($_POST["email"]);
        $array["phone"] = test_input($_POST["phone"]);
        $array["message"] = test_input($_POST["message"]);
        $array["file"] = test_input($_POST["file"]);

        $array["isSuccess"] = true;
        $emailText = "exodelouis43@gmail.com";

        if (empty($array["firstname"]))
        {
            $array["firstnameError"] = "Merci d'écrire votre prénom, s'il vous plaît  !";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Firstname: {$array['firstname']}\n";
        }
        //-first name
        if (empty($array["name"]))
        {
            $array["nameError"] = "votre nom !";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Name: {$array['name']}\n";
        }
        //my e-mail address
        if(!isEmail($array["email"]))
        {
            $array["emailError"] = "Votre email s'il vous plaît   !";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Email: {$array['email']}\n";
        }
        //phone

        if (!isPhone($array["phone"]))
        {
            $array["phoneError"] = "Que des chiffres et des espaces, s'il vous plaît ...";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Phone: {$array['phone']}\n";
        }
        //les messages 

        if (empty($array["message"]))
        {
            $array["messageError"] = "Votre text s'il vous plaît ?";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Message: {$array['message']}\n";
        }

        //test file
        if (empty($array["fille"]))
        {
            $array["fileError"] = "fichier text seulement s'il vous plaît ?";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "file: {$array['']}\n";
        }
   
        //submit my doc
        if($array["isSuccess"])
        {
            $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, "Un message de votre site", $emailText, $headers);
        }

        echo json_encode($array);

    }

    function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function isPhone($phone)
    {
        return preg_match("/^[0-9 ]*$/",$phone);
    }
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>
