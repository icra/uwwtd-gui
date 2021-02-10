<?php
/*
  expose sql data as json

  estructura capes GIS:

  capa 1: punts de descàrrega
    - [ok] punts de descarrega
    - [ok] coordenades
    - C1,C2,...,C6
    - [ok] tecnologies (columnes)
    - population equivalents
    - cabal

  capa 2: aglomeracions sense tractament o onsite treatment
    - TBD

  aglomeracions:
    SELECT
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

*/
include 'load_db.php';

$dev_mode = isset($_GET['dev_mode']) ? true            : false ; //veure detalls
$format   = isset($_GET['format'])   ? $_GET['format'] : "json"; //["csv","json"], default "json"

//sql query
$sql="
  SELECT
    dcp.dcpCode,
    dcp.dcpName,
    dcp.dcpState,
    dcp.dcpLatitude,
    dcp.dcpLongitude,
    dcp.dcpWaterBodyType,
    uww.uwwCode,
    uww.uwwName,
    uww.uwwState,
    uww.uwwLatitude,
    uww.uwwLongitude,
    uww.uwwPrimaryTreatment,
    uww.uwwSecondaryTreatment,
    uww.uwwOtherTreatment,
    uww.uwwNRemoval,
    uww.uwwPRemoval,
    uww.uwwUV,
    uww.uwwChlorination,
    uww.uwwOzonation,
    uww.uwwSandFiltration,
    uww.uwwMicroFiltration,
    uww.uwwOther,
    uww.uwwSpecification,
    agg.aggCode,
    agg.aggName,
    con.aucMethodPercEnteringUWWTP,
    agg.aggC1,
    agg.aggC2,
    agg.aggPercWithoutTreatment AS aggC3,
    agg.aggC1 + agg.aggC2 + agg.aggPercWithoutTreatment AS SUM_agg,
    con.aucPercEnteringUWWTP,
    con.aucPercC2T as aucPercTrucks,
    con.aucPercEnteringUWWTP + con.aucPercC2T           AS SUM_con
  FROM
    T_DischargePoints AS dcp,
    T_UWWTPs          AS uww,
    T_UWWTPAgglos     AS con,
    T_Agglomerations  AS agg
  WHERE
    dcp.uwwCode    = uww.uwwCode AND
    con.aucUwwCode = uww.uwwCode AND
    con.aucAggCode = agg.aggCode AND
    dcp.dcpState  != 0           AND
    uww.uwwState  != 0
  LIMIT 1


";

//show sql statement
if($dev_mode){
  echo "<b>$sql</b><hr><br>";
}

//execute query
$res=$db->query($sql);

if($format=="json"){
  echo "[";
  while($row=$res->fetchArray(SQLITE3_ASSOC)){
    $obj=(object)$row; //convert to object

    echo "{";
      foreach($obj as $key=>$val){
        echo "\"$key\":\"$val\",";
        echo "<br>";
      }
    echo "},";
    if($dev_mode) echo "<br>";
  }
  echo "]";
}else if($format=="csv"){
  $i=0;
  while($row=$res->fetchArray(SQLITE3_ASSOC)){
    $obj=(object)$row; //convert to object

    //print column names
    if($i==0){
      foreach($obj as $key=>$val){
       echo "$key,";
      }
      echo "<br>";
    }

    //print row
    foreach($obj as $key=>$val){echo "$val,";}

    //end row
    echo "<br>";
    $i++;
  }
}else if($format=="html"){
  $i=0;
  echo "<table border=1>";
  while($row=$res->fetchArray(SQLITE3_ASSOC)){
    $obj=(object)$row; //convert to object

    if($i==0){
      echo "<tr>";
      foreach($obj as $key=>$val){echo "<th>$key</th>";}
      echo "</tr>";
    }

    echo "<tr>";
    foreach($obj as $key=>$val){echo "<td>$val</td>";}
    echo "</tr>";

    $i++;
  }
}else{
  die("format error -> 'format=$format'");
}

?>
