<?php

function log_msg($type = "INFO", $msg = "")
{
    // generating the timestamp.
    $timestamp=date("Y-m-d h:i:s");
    $message="[$type] $timestamp: $msg\n";
    //code for logging the msg
    if ($message) {
        // appending the log file for every event occurs.
        $fd = fopen(LOGFILE, "a");
        // write the event log with a message in a log file.
        fwrite($fd, $message);
        // close the log file after event gets completed.
        fclose($fd);
    }

}

function print_arr($arr)
{
    echo "<pre>ARR=[".print_r($arr, true)."]</pre>";
}

function get_arg($ARR, $var)
{
    if (isset($ARR[$var])) {
        return str_replace("'", "''", $ARR[$var]);
    } else {
        return "";
    }
}

function create_dir($existpath, $newdir)
{
    //CHECKING PATH EXISTING OR NOT
    if (file_exists($existpath)) {
        if (file_exists($existpath.'/'.$newdir)) {
            return true;
        }
        mkdir($existpath.'/'.$newdir, 0777, true);
    } else {
        return false;
    }   // IF PATH NOT EXISTING RETURNING FALSE
    return true;
}
