<?php
$PORT = 12345; //��server�˿�ƥ��
$client = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); //����socket/����1:����IPV4/����2��������/����3��TCP/
$result = socket_connect($client, "127.0.0.1", $PORT); //��ָ����ַ/�˿ڷ��������������ӽ�����ص�resule/127.0.0.1ָ����IP
if($result == false){  //�������Ǽ򵥵Ķ����ӽ��������Ӧ/Ϊ��Debug����
    echo "ERROR CONNECT\n"; 
    die();
} else {
    echo "CONNECTED\n";
}
$data = "Hello World\n"; //������Ҫ���͵���Ϣ
socket_write($client, $data); //����Ϣ���ͳ�ȥ
socket_close($client); //�ر�socket
?>