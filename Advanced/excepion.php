<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Excepion</title>
</head>
<body>
<?php
function checkNum($number) {
    if($number>1) {
        throw new Exception("Value must be 1 or below");
    }
    return true;
}

try {
    checkNum(2);
    echo 'If you see this, the number is 1 or below';
}

catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}

class customException extends Exception {
    public function errorMessage() {
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
            .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

$email = "someone@example.com";

try {
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        throw new customException($email);
    }
}

catch (customException $e) {
    echo $e->errorMessage();
}
?>
</body>
</html>