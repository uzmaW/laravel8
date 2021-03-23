<?php
ini_set('display_errors',1); 
//StringChallenge();
//BracketMatch();

use phpDocumentor\Reflection\Types\Boolean;

 




function PrintBinaryNumbers($N) {
    function calcbin($N) {
        $decimal = $N;
        $binary = '';
             while($decimal >= 1){
                 $rem = $decimal % 2;
                 $decimal /= 2;
                 $binary = $rem.$binary;
             }
             if($binary == null){
                 $binary = 0;
             }
             
             return $binary;   
     }
     function _printBinary($N) {
         // write your code in PHP7.0
                 if( ($N<1 || $N>2147483647) ) {        
                     return 0;
                 }
           
         $f = calcbin($N);
         $f = "$f";
         $calcBinaryCount = 0;
         $calcBinaryGroupArr = [];
         $calcBinary = [];
         $binaryExist = $start = false;
         for($i=0;$i<strlen($f);$i++) {
           
             if($start == true && $f[$i] == '0') {
                 $calcBinary[] = '0';
                 $calcBinaryCount++;
                 $binaryExist = true;
             }
             if($f[$i] == '1') 
             {  
                 $start = true;
             }
             if($start==true && $calcBinaryCount>0 && $f[$i] == '1') {   
                 $s = count($calcBinary);
                 $calcBinaryGroupArr[] = $s; 
                 $calcBinary = [];    
                 $calcBinaryCount = 0;
             }
         }
           $max = !empty($calcBinaryGroupArr)?max($calcBinaryGroupArr):0; 
     
           return $binaryExist? $max:0;
    }
    _printBinary($N);
}

function TreeTraversal() {

}

function BracketMatch() {

    function solution($S,$bracketVars) {
        // write your code in PHP7.0
        $SR = strrev($S);
        $SR = strtr($SR,[')(','][','}{'],'');
        extract($bracketVars);
   
        $StartBracketsToSearch = [];
        $EndBracketsToSearch = [];
        $BrackettError = 1;
        $BracketCount=0;
        $Inner = [];

        $strlength = strlen($S);
        for($i=0;$i<$strlength;$i++ ) {
            if(in_array($S[$i],$StartBracketsKeys)) {
                array_push($StartBracketsToSearch,$S[$i]);
                $BracketCount++;
            }

          
            if(in_array($S[$i],$EndBracketsKeys)) {
               if($S[$i] == $Brackets[$StartBracketsToSearch[$BracketCount-1]]) 
               if(!in_array(($BracketCount-1),$Inner)) $Inner[] = $BracketCount-1 ;
               
                array_push($EndBracketsToSearch,$S[$i]);
               
            }
        }
     
       
        if(count($StartBracketsToSearch) !== count($EndBracketsToSearch)) return 0;
        

        $EndBracketsToSearchR = array_reverse($EndBracketsToSearch);
        $BracketIndex = 0;
        
        foreach($StartBracketsToSearch as $key=>$bracket) {
            if(in_array($BracketIndex,$Inner) ) 
               {
                $Sorted[$BracketIndex] = $Brackets[$bracket];
               }
              else 
                $Sorted[$BracketIndex] =  $EndBracketsToSearchR[$BracketIndex];
                $BracketIndex++;
        }     
        $BracketIndex = 0;
        foreach($StartBracketsToSearch as $key=>$bracket) {
            $CurrentBracket = $Sorted[$BracketIndex];
            $inValidBracketFound =  $Brackets["$bracket"] !== $CurrentBracket;
            if($inValidBracketFound) $BrackettError = 0;
            $BracketIndex++;            
        }
   
        return $BrackettError;

    }


$Brackets = ['['=>']','{'=>'}','('=>')'];
$BracketsReverse = [']'=>'[','}'=>'{',')'=>'('];
$StartBracketsKeys = ['[','{','('];
$EndBracketsKeys = [']','}',')'];

$data = compact('Brackets', 'StartBracketsKeys', 'EndBracketsKeys','BracketsReverse');

$r = solution("{[(){}]}",$data);
echo $r;

}

function StringChallenge() {

    $_StringChallenge = function($str) {
        
        preg_match_all('/[<>]/', $str, $tagExists);
        //if(empty($str) || count($tagExists)<2) return false;
        
        // Match these  tags b, i, em, div, p
        
        $startRegEx = '/<div|<b|<em|<i|<p+(.*)<\+/';
        $endRegEx = '/<\/div>|<\/b>|<\/em>|<\/i>|<\/p>+/';
        
        
        preg_match_all($startRegEx, $str, $startTags);
        preg_match_all($endRegEx,$str,$endTags);
        
        $sizeOfTags = count($startTags);
        $st = $startTags[0];

        //if( $sizeOfTags !== count($endTags)) return false;
        $endTags = $endTags[0];

        for($i=0;$i<=$sizeOfTags;$i++) {
            $s2 = $st[$i] = str_replace('<','',$st[$i]);
            $s3 = $endTags[$i] = str_replace(['</','>'], '', $endTags[$i]);
            if($st[$i] ===  $endTags[$i] ) {
                $st[$i] ='';
                $endTags[$i] ='';
            }

        }
        $st = array_values(array_filter($st));
        $endTags = array_filter($endTags);
        $endTags = array_values(array_reverse($endTags));
        for($i=0;$i<count($endTags);$i++) {
            if($st[$i] !==  $endTags[$i] ) {
                $mismatch = $st[$i];
            }

        }
        return $mismatch;
    };
    // runs the test
    $str=['<div></div><div><b></b></p>'.'<html>','<div>dfsd<em><p>dfd</p></b>'];
    foreach($str as $html) {
        echo '<br/>The tag needs to be changed is  '.$_StringChallenge($html);
    }
  
}
   


?>

