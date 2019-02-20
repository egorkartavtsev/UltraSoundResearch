<?PHP
#
# Prints out the DICOM tags in a file specified on the command line
#

require_once('./dicom_lib.php');

$file = '../addit/dean.dcm';

$dcm = new dicom($file);
//$tmpRes = Execute(getCommand(BIN_DCMDUMP, ["-M", "+L", "+Qn", "+U8"], $file));
$tmpRes = $dcm->getFile();
$rows = "";
//$rows = "<table class=\"table table-sm table-bordered\">"
//        . "<thead class=\"thead-dark\">"
//        . "<tr><th>Tag</th><th>V1</th><th>VALUE</th><th>AnY</th><th>V2</th><th>NAME</th></tr>"
//        . "</thead>"
//      . "<tbody>";
foreach ($tmpRes as $row) {
//    $rows.= '<tr><td>'.$row['tags'].'</td><td>'.$row['var1'].'</td><td>'.$row['val'].'</td><td>'.$row['any'].'</td><td>'.$row['var2'].'</td><td>'.$row['name'].'</td></tr>';
    $rows.= '<div class="alert alert-dark">'.$row.'</div>';
}
//$rows.= "</tbody></table>";
echo $rows;

?>
