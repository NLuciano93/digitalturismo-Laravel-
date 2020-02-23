<?php
require 'config.php';

    if (isset($_GET["id"])) {
       $borrado= Destino::borrarDestino($id);

        

    }

    header("Location:adminIndex.php?list=listD&delete=$borrado");

?>