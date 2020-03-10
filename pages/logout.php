<?php
if(session_destroy()) // Destroying All Sessions
{
    echo '<script> location.replace("/login"); </script>';
}
?>