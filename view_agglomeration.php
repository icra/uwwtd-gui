<?php
/*
  view agglomeration
*/
include 'load_db.php';

//GET
$aggCode = SQLite3::escapeString($_GET['aggCode']);
?>

<!doctype html><html><head>
  <meta charset=utf8>
  <title>Agglomeration <?php echo $aggCode?></title>
</head><body>

<!--title-->
<h3>
  <a href="index.php">Start</a>
  &rsaquo;
  <a href="T_Agglomerations.php">T_Agglomerations</a>
  &rsaquo;
  <?php echo $aggCode ?>
</h3>

<!--fields-->
<table border=1>
<?php
  $sql="SELECT * FROM T_Agglomerations WHERE aggCode='$aggCode'";
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

<!--connections-->
<b>Connected to the following UWWTPS (table T_UWWTPAgglos)</b>
<table border=1>
  <?php
    $sql="SELECT * FROM T_UWWTPAgglos WHERE aucAggCode='$aggCode'";
    $res=$db->query($sql);
    while($row=$res->fetchArray(SQLITE3_ASSOC)){
      $obj=(object)$row; //convert to object

      echo "
        <tr>
          <th>aucUwwCode <td><a href='view_uwwtp.php?uwwCode=$obj->aucUwwCode'>$obj->aucUwwCode</a>
          <th>aucUwwName <td>$obj->aucUwwName
        </tr>
      ";
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
    $sql="SELECT * FROM T_UWWTPS WHERE aggCode='$aggCode'";
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
