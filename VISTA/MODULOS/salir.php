<?php
//NOTE  Destruimos la Sesion..
session_destroy();

# Redireccionamos con un JS..
echo '<script> window.location = "login"; </script>';