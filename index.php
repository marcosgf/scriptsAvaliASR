<html>
<head>
    <meta  charset=utf-8 />
    <title> </title>
</head>
<body>
<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
/**
 * Created by PhpStorm.
 * User: marcos
 * Date: 14/04/16
 * Time: 17:31
 */

function frequency ($file){
	$textos = file_get_contents($file);
    $novo = fopen("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aulaP01.txt","a+");
    $final = fopen("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aulaF01.txt","a+");
    $k=0;
    $texto = "";
    $palavras = array();
    $words = explode("|",$textos);
    for($i=0 ; $i < sizeof($words); $i++){
    	$parada = file_get_contents("/home/marcos/Área de Trabalho/Transcritos/stopwords.txt");
    	$paradas = explode("|",$parada);
    	$l = 0;
    	//echo "palavra: ".$words[$i]."<br>";
    	for($j=0 ; $j < sizeof($paradas) ; $j++){
         	if ($words[$i] == $paradas[$j]){
         		$l = 1;
           		break;
         	}
         }
         if($l == 0 ){
          	$texto = $texto.$words[$i]."|";
          	$escrita = $words[$i]."|";
          	$escreve = fwrite($novo,$escrita);
         }

    }
    fclose($novo);
    $new = file_get_contents("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aulaP01.txt");
    $ne = explode("|",$new);
    for ($i=0 ; $i<sizeof($ne); $i++){
     	//echo $ne[$i];
       	$qtd = substr_count($texto,$ne[$i]);
      	$palavra[$ne[$i]] = $qtd;
    }
    arsort($palavra);
    foreach($palavra as $chave => $valor) {
    	if($chave != "\r\n"){
         	$escreve = fwrite($final,$chave."-".$valor."\n");
        }
   	}
    fclose($final);
    break;
	unlink("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aulaP01.txt");
}

///GERA FREQUENCIA DE PALAVRAS DO TRANSCRITO ORIGINAL
    	$textos = file_get_contents("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aula01.txt");
        $novo = fopen("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aulaP01.txt","a+");
        $final = fopen("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aulaF01.txt","a+");
        $k=0;
        $texto = "";
        $palavras = array();
        $words = explode("|",$textos);
        for($i=0 ; $i < sizeof($words); $i++){
            $parada = file_get_contents("/home/marcos/Área de Trabalho/Transcritos/stopwords.txt");
            $paradas = explode("|",$parada);
            $l = 0;
            //echo "palavra: ".$words[$i]."<br>";
            for($j=0 ; $j < sizeof($paradas) ; $j++){
                if ($words[$i] == $paradas[$j]){
                    $l = 1;
                    break;
                }
            }
            if($l == 0 ){
                $texto = $texto.$words[$i]."|";
                $escrita = $words[$i]."|";
                $escreve = fwrite($novo,$escrita);
            }

        }
        fclose($novo);
        $new = file_get_contents("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aulaP01.txt");
        $ne = explode("|",$new);
        for ($i=0 ; $i<sizeof($ne); $i++){
            //echo $ne[$i];
            $qtd = substr_count($texto,$ne[$i]);
            $palavra[$ne[$i]] = $qtd;
        }
        arsort($palavra);
        foreach($palavra as $chave => $valor) {
            if($chave != "\r\n"){
                $escreve = fwrite($final,$chave."-".$valor."\n");
            }
		}
        fclose($final);
    	break;
		unlink("/home/marcos/Área de Trabalho/Transcritos/TranscritosOriginais/aulaP01.txt");



///ENVIA ARQUIVO PARA SOFTWARE AUDIMUS E AGUARDA RETORNO DE TRANSCRIÇÃO
/*
$caminho = "/home/marcos/Área de Trabalho/aula01-36-36.wav";
$ex = explode("/",$caminho);
$ex1 = explode(".",$ex[4]);
$video = $ex1[0];
$respostaEnvio = shell_exec('sshpass -p "107166" scp /home/marcos/Área\ de\ Trabalho/'.$video.'.wav "Marcos@10.5.18.12:/cygdrive/c/Program\ Files/VoiceInteraction/Audimus.Server/folderProcessor/InFolder-pt_BR/'.$video.'.wav"');
$i =0 ;
exec('sshpass -p "107166" scp "Marcos@10.5.18.12:/cygdrive/c/Program\ Files/VoiceInteraction/Audimus.Server/folderProcessor/OutFolder-pt_BR/TXT/'.$video.'.txt" /home/marcos/Área\ de\ Trabalho/'.$video.'.txt',$output,$return);
echo "return : $return";
while($return == 1){
    echo "Aguardando Transcrição usando software Audimus...";
    sleep(20);
    if($i > 100){
        break;
    }
    $i++;
    exec('sshpass -p "107166" scp "Marcos@10.5.18.12:/cygdrive/c/Program\ Files/VoiceInteraction/Audimus.Server/folderProcessor/OutFolder-pt_BR/TXT/'.$video.'.txt" /home/marcos/Área\ de\ Trabalho/'.$video.'.txt',$output,$return);
    echo "return : $return";
}
*/


?>
</body>
</html>