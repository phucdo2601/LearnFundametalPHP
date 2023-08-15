<?php
session_start();

// destroy the session
session_destroy();
header('Location: /13_sessions.php');