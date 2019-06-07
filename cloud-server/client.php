<?php
$client = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// $result = socket_connect($client, "127.0.0.1", 8080);
$result = socket_connect($client, "xx.xx.xx.xx", 8080);//change xx.xx.xx.xx to your server IP. 将xx.xx.xx.xx改为自己服务器的公网IP  
if($result == false) {    //error if connect be refuse.
    echo "ERROR CONNECT\n";
    die();
} else {
    echo "CONNECTED\n";
}
while(true) { //input "quit" to end the socket
    echo "\nInput the msg:";
    $data = fread(STDIN, 1024); //input message by the terminal
    if($data == "quit\r\n") { //check input msg
        echo "Socket Close\n";
        break;
    }
    $sendStatus = socket_write($client, $data); //send the msg to server
    if($sendStatus != false) {
        echo "Success send to server:".$data;
    }
    do { //wait the server make a response
        $feedback = socket_read($client,1024); 
        if($feedback != false) { 
            echo "Success receive from server:".$feedback;
            break;
        }
    } while(true);
}
socket_close($client); //close the socket
?>
