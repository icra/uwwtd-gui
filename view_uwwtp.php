<?php
/*
  view uwwtp
*/
include 'load_db.php';

//GET
$uwwCode = SQLite3::escapeString($_GET['uwwCode']);
?>

<!doctype html><html><head>
  <meta charset=utf8>
  <title>UWWTP <?php echo $uwwCode?></title>
</head><body>

<!--title-->
<h3>
  <a href="index.php">Start</a>
  &rsaquo;
  <a href="T_UWWTPS.php">T_UWWTPS</a>
  &rsaquo;
  <?php echo $uwwCode ?>
</h3>

<!--fields-->
<table border=1>
<?php
  $sql="SELECT * FROM T_UWWTPS WHERE uwwCode='$uwwCode'";
  $res=$db->query($sql);
  while($row=$res->fetchArray(SQLITE3_ASSOC)){
    $obj=(object)$row; //convert to object

    //iterate keys
    foreach($obj as $key=>$val){
      if(!$val) continue;
      echo "
        <tr>
          <th>$key
          <td>$val
        </tr>
      ";
    }
  }
?>
</table><hr>

<!--discharge points-->
<b>Discharge points (connection with table T_DischargePoints)</b>
<table border=1>
  <?php
    $sql="SELECT * FROM T_DischargePoints WHERE uwwCode='$uwwCode'";
    $res=$db->query($sql);
    while($row=$res->fetchArray(SQLITE3_ASSOC)){
      $obj=(object)$row; //convert to object
      echo "
        <tr>
          <th>dcpCode <td><a href='view_dcp.php?dcpCode=$obj->dcpCode'>$obj->dcpCode</a>
          <th>dcpName <td>$obj->dcpName
        </tr>
      ";
    }
  ?>
</table><hr>

<!--connections-->
<b>Agglomerations connected (connection with table T_UWWTPAgglos)</b>
<table border=1>
  <?php
    $sql="SELECT * FROM T_UWWTPAgglos WHERE aucUwwCode='$uwwCode'";
    $res=$db->query($sql);
    while($row=$res->fetchArray(SQLITE3_ASSOC)){
      $obj=(object)$row; //convert to object

      echo "
        <tr>
          <th>aucAggCode <td><a href='view_agglomeration.php?aggCode=$obj->aucAggCode'>$obj->aucAggCode</a>
          <th>aucAggName <td>$obj->aucAggName
        </tr>
      ";
    }
  ?>
</table>
