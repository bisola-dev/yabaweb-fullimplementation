<?php
$connectionInfo = array("UID" => "gbenga", "PWD" => "7Xuj91jqe8yoijid989ue!N", "Database" => "erp", "ReturnDatesAsStrings" => true);
$conn = sqlsrv_connect("217.174.242.54", $connectionInfo);
if (!$conn) {
    echo "errorconnection";
    die();
    }
?>
