<?php

define('TOOLKIT_DIR', 'D:\OpenServer\domains\dicom\bin'); // CHANGE THIS IF YOU HAVE DCMTK INSTALLED SOMEWHERE ELSE
define('ADDITS', '../addit/');
/**********************************************************/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
  define('RUNNING_WINDOWS', 1);
} 
else {
  define('RUNNING_WINDOWS', 0);
}
/**********************************************************/
if(RUNNING_WINDOWS) {
  define('BIN_DCMDUMP', TOOLKIT_DIR . '\dcmdump.exe');
  define('BIN_STORESCU', TOOLKIT_DIR . '\storescu.exe');
  define('BIN_STORESCP', TOOLKIT_DIR . '\storescp.exe');
  define('BIN_ECHOSCU', TOOLKIT_DIR . '\echoscu.exe');
  define('BIN_DCMJ2PNM', TOOLKIT_DIR . '\dcmj2pnm.exe');
  define('BIN_DCMODIFY', TOOLKIT_DIR . '\dcmodify.exe');
  define('BIN_DCMCJPEG', TOOLKIT_DIR . '\dcmdjpeg.exe');
  define('BIN_DCMDJPEG', TOOLKIT_DIR . '\dcmcjpeg.exe');
  define('BIN_XML2DCM', TOOLKIT_DIR . '\xml2dcm.exe');
  define('BIN_IMG2DCM', TOOLKIT_DIR . '\img2dcm.exe');
} else {
  define('BIN_DCMDUMP', TOOLKIT_DIR . '/dcmdump');
  define('BIN_STORESCU', TOOLKIT_DIR . '/storescu');
  define('BIN_STORESCP', TOOLKIT_DIR . '/storescp');
  define('BIN_ECHOSCU', TOOLKIT_DIR . '/echoscu');
  define('BIN_DCMJ2PNM', TOOLKIT_DIR . '/dcmj2pnm');
  define('BIN_DCMODIFY', TOOLKIT_DIR . '/dcmodify');
  define('BIN_DCMCJPEG', TOOLKIT_DIR . '/dcmdjpeg');
  define('BIN_DCMDJPEG', TOOLKIT_DIR . '/dcmcjpeg');
  define('BIN_XML2DCM', TOOLKIT_DIR . '/xml2dcm');
  define('BIN_IMG2DCM', TOOLKIT_DIR . '/img2dcm');
}
/********************************************************************/
function Execute($command) {
  $handle = popen($command, 'r');
  $lines = [];
  while (!feof($handle)) {
    $line = fgets($handle);
    $lines[] = $line;
  }
  pclose($handle);
  return $lines;
}
///////////////////////////////////////////////////////
function getCommand($module, $options, $file = ""){
    $command = $module;
    foreach($options as $opt){
        $command.= " ".$opt;
    }
    return $command . " " . $file . " 2>&1";
};
//////////////////////////////////////////////////////

?>