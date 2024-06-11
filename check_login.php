<?php
session_start();
echo json_encode(['isAuthenticated' => isset($_SESSION['user_id'])]);
?>
