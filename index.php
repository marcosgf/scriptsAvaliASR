<?php
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 14/04/16
 * Time: 17:31
 */
$caminho = "/home/marcos/Área de Trabalho/Aula02.wav";
$ex = explode("/",$caminho);
$ex1 = explode(".",$ex[4]);
$video = $ex1[0];
$respostaEnvio = shell_exec('sshpass -p "107166" scp /home/marcos/Área\ de\ Trabalho/'.$video.'.wav Marcos@10.5.18.12:/cygdrive/c/folderProcessor/InFolder-pt_BR/'.$video.'.wav');
$i =0 ;

while(shell_exec('sshpass -p "107166" ssh Marcos@10.5.18.12: & cd /cygdrive/c/folderProcessor/OutFolder-pt_BR/TXT/ & ls') ==
    "scp: /cygdrive/c/folderProcessor/OutFolder-pt_BR/TXT/$video.txt: No such file or directory"){
    echo "Aguardando Transcrição usando software Audimus...";
    sleep(15);
    if($i > 50){
        break;
    }
    $i++;
}
