<?php

require_once './library.php';

class dicom {
    
    private $fLines;
    private $file = [];
    
    function __construct($file) {
        if(file_exists($file)){
            // tut ne rabotaet 
            $this->file = $this->getDump(Execute(getCommand(BIN_DCMDUMP, ["-M", "+L", "+Qn", "+U8"], $file)));
        } else {
        }
    }
    
    /********************* private sector**********************************/
    
    private function getDump($lines){
        $struct = [];
        
        for($i=0;$i<count($lines);$i++){
            if(trim($lines[$i])!=="" && trim($lines[$i][0])!=='#'){
                $struct[] = $lines[$i];
            }
        }
        //exit(var_dump($struct));
        return $struct;
    }
    
    /********************* public sector**********************************/
    public function getFile() {
        return $this->file;
    }
    
}