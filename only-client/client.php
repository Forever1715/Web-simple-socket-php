<?php
$PORT = ���ö˿�; //�˿ں���鿴���ģ�*3.2.2 ����ִ��*��������Ч�˿ڣ�
$client = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); //����socket/����1:����IPV4/����2��������/����3��TCP/
$result = socket_connect($client, "47.102.206.74", 8080); //��ָ����ַ/�˿ڷ��������������ӽ�����ص�resule
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