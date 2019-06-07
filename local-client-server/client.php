<?php
$PORT = 12345; //与server端口匹配
$client = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); //创建socket/参数1:代表IPV4/参数2：流传输/参数3：TCP/
$result = socket_connect($client, "127.0.0.1", $PORT); //向指定地址/端口发出连接请求，连接结果返回到resule/127.0.0.1指本地IP
if($result == false){  //这里我们简单的对连接结果进行响应/为了Debug方便
    echo "ERROR CONNECT\n"; 
    die();
} else {
    echo "CONNECTED\n";
}
$data = "Hello World\n"; //建立将要发送的消息
socket_write($client, $data); //将消息发送出去
socket_close($client); //关闭socket
?>