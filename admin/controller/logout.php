<?php
ob_start();
session_start();
session_unset();
session_regenerate_id(true);
session_unset();
session_destroy();
header('Location: http://localhost/UAS/admin');
?>