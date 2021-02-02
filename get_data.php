<?php
/*
  expose sql data as json
*/
include 'load_db.php';

$dev_mode = isset($_GET['dev_mode']) ? true : false;             //veure detalls
$format   = isset($_GET['format'])   ? $_GET['format'] : "json"; //"csv" o "json"

//query
$sql="
  SELECT
    aggCode,
    aggName,
    rptMStateKey,
    aggC1,
    aggC2,
    aggCalculation,
    aggGenerated,
    aggLatitude,
    aggLongitude,
    aggPercWithoutTreatment,
    aggState
  FROM
    T_Agglomerations
  WHERE
    aggState != 0
  LIMIT 1000
";

$sql="
  SELECT
    uwwCode,
    uwwName,
    rptMStateKey
  FROM
    T_UWWTPs
  WHERE
    uwwState != 0
  LIMIT 1000
";

if($dev_mode) echo "<b>$sql</b><hr><br>";
$res=$db->query($sql);

if($format=="json"){
  echo "[";
  while($row=$res->fetchArray(SQLITE3_ASSOC)){
    $obj=(object)$row; //convert to object

    echo "{";
      foreach($obj as $key=>$val){
        echo "
          \"$key\":\"$val\",
        ";
      }
    echo "},";
    if($dev_mode) echo "<br>";
  }
  echo "]";
}else if($format=="csv"){
  $i=0;
  while($row=$res->fetchArray(SQLITE3_ASSOC)){
    $obj=(object)$row; //convert to object

    if($i==0){
      foreach($obj as $key=>$val){
        echo "
          $key,
        ";
      }
      echo "<br>";
    }

    foreach($obj as $key=>$val){
      echo "
        $val,
      ";
    }
    echo "<br>";

    $i++;
  }
}
else{
  die("format error");
}

?>
