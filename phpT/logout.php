<?php 
    session_start();
    session_destroy();
    setcookie("email", $_SESSION["email"], time() - 1 );
    setcookie("nombre", $_SESSION["nombre"], time() - 1);
    setcookie("facebook", $_SESSION["facebook"], time() - 1);
    setcookie("instagram", $_SESSION["instagram"], time() - 1);
    setcookie("twitter", $_SESSION["twitter"], time() - 1);
    setcookie("avatar", $_SESSION["avatar"], time() - 1);
    if (isset($_GET["actualizar"])) {
        if ($_GET["actualizar"] == "ok") {
            header("Location: index.php?actualizar=ok");
            exit;
        }
    }
    header("Location: index.php");

?>