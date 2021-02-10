<?php
/*
  view dcp
*/
include 'load_db.php';

//GET
$dcpCode = SQLite3::escapeString($_GET['dcpCode']);
?>

<!doctype html><html><head>
  <meta charset=utf8>
  <title>Discharge point <?php echo $dcpCode?></title>
</head><body>

<!--title-->
<h3>
  <a href="index.php">Start</a>
  &rsaquo;
  <a href="T_DischargePoints.php">T_DischargePoints</a>
  &rsaquo;
  <?php echo $dcpCode ?>
</h3>

<!--fields-->
<table border=1>
<?php
  $sql="SELECT * FROM T_DischargePoints WHERE dcpCode='$dcpCode'";
  $res=$db->query($sql);
  while($row=$res->fetchArray(SQLITE3_ASSOC)){
    $obj=(object)$row; //convert to object

    //get uww code
    $uwwCode = $obj->uwwCode;

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

<b>Connected to the following UWWTPS (table T_UWWTPS)</b>
<table border=1>
  <?php
    $keys=[
      "uwwCode",
      "uwwName",
    ];
    $sql="SELECT * FROM T_UWWTPS WHERE uwwCode='$uwwCode'";
    $res=$db->query($sql);
    while($row=$res->fetchArray(SQLITE3_ASSOC)){
      $obj=(object)$row; //convert to object

      echo "
        <tr>
          <th>uwwCode <td><a href='view_uwwtp.php?uwwCode=$obj->uwwCode'>$obj->uwwCode</a>
          <th>uwwName <td>$obj->uwwName
        </tr>
      ";
    }
  ?>
</table>
