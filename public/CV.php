<?php
    if (isset($_POST["submit123"])) {
        $template = $_POST["selectedImage"];
        header("Location: ../Front/Template/CV" . $template . ".php");
    }
?>