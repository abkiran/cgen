<?php
global $conn;

function db_connect($db_name)
{
    global $conn;
    // Create connection
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, $db_name);
    // Check connection
    if ($conn->connect_error) {
        log_msg('INFO', "\nConnection failed: " . $conn->connect_error);
    }
    
}


function query($sql, $type = "SELECT")
{
    global $conn;

    $result = $conn->query($sql);
    if (!$result) {
        log_msg('INFO', "\n\nCould not run query: \n\nSQL=$sql\n\nERROR: " . $conn->error);
        return 0;
    }
    $rows = array();
    if ($result && $type!='INSERT') {
        while ($row = $result->fetch_assoc()) {//mysql_fetch_assoc($result)) {
            $rows[] = $row; // Inside while loop
        }
        $rows[0]['nrows'] = count($rows);
    }
    return $rows;
}

function db_close()
{
    global $conn;
    $conn->close();
}

function db_transaction_start()
{
    global $conn;
    $conn->begin_transaction();
}

function db_transaction_commit()
{
    global $conn;
    $conn->commit();
}
