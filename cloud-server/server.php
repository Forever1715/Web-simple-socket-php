<?php
$server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($server, "0.0.0.0", 8080);
socket_listen($server);
$connectPool = array($server);    
while(true){
    $reads = $connectPool;
    $writes = $except = $tv = null;
    socket_select($reads, $writes, $except, $tv); 
    foreach ($reads as $read) {
        if($read == $server) {
            //this is server
            $con = socket_accept($server);
            $connectPool[] = $con; //add the server to connect Pool
        }
        else {
            //this is connection
            $data = socket_read($read, 1024);
            if("" == $data) {  //disconnected
                socket_close($read);
                $connectPool = array_diff($connectPool, [$read]); //delete the connection
            } else {//echo $data;
            if(socket_getpeername($read,$remote_ip)) { //print the received data
                echo "Receive data from \"".$remote_ip."\":".$data;
            } else { //when the client_ip can't be get, print the error and data.
                echo socket_last_error($read);
                echo "Receive data from no-namer:".$data;
            }
            socket_write($read, "Received your data\n"); //make a response to the client
            foreach ($connectPool as $othersCon) { 
                if($othersCon != $server && $othersCon != $read) {
                    socket_getpeername($read,$remote_ip);
                    socket_write($othersCon, "Data from \"".$remote_ip."\":".$data); //transmit to other client.
                }
            }
            }
        }
    }
}
socket_close($server);
?>