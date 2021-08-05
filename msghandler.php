<?php

include 'template/auth.php';

require_once 'template/dbconnection.php';
$conn = DbConnection::getConnection();



DbConnection::closeConnection($conn);
