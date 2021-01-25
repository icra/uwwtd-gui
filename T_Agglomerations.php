<?php
/*
  table T_Agglomerations
*/
include 'load_db.php';

$limit  = isset($_GET['limit']) ? $_GET['limit'] : 100;
$page   = isset($_GET['page'])  ? $_GET['page']  : 1; 
$offset = ($page - 1)*$limit;

?>
<!doctype html><html><head>
  <script src="table_definitions.js"></script>
  <script src="lib/vue.js"></script>
  <meta charset=utf8>
  <title>T_Agglomerations</title>
</head><body>

<!--title-->
<h3>
  <a href="index.php">Start</a>
  &rsaquo;
  T_Agglomerations
</h3>

<!--number of rows-->
<?php
  $sql="SELECT COUNT(*) FROM T_Agglomerations";
  $n_rows = current($db->query($sql)->fetchArray(SQLITE3_ASSOC));
  echo "<p>The table has $n_rows rows</p>";
?>

<!--rows-->
<div id=app>
<table border=1>
<?php
  $keys=[
    'aggCode',
    'aggName',
    'rptMStateKey',
  ];

  $sql="SELECT * FROM T_Agglomerations ORDER BY aggName LIMIT $offset,$limit";
  $res=$db->query($sql);
  $i=0;
  while($row=$res->fetchArray(SQLITE3_ASSOC)){
    $obj=(object)$row; //convert to object

    if($i==0){
      echo"<tr>";
      foreach($keys as $key){
        echo "
          <th :title=\"get_field_definition('$key')\">
            $key
          </th>
        ";
      }
      echo"</tr>";
    }

    //new row
    echo "<tr>";

    //aggCode
    echo "<td>
      <a href='view_agglomeration.php?aggCode=$obj->aggCode'>
        $obj->aggCode
      </a>
    </td>";

    echo "<td>$obj->aggName</td>";
    echo "<td>$obj->rptMStateKey</td>";
    echo "</tr>";
    $i++;
  }
?>
</table>
</div><hr>

<!--select page-->
<div>
  Page:
  <?php
    //number of pages
    $n_pages = $n_rows/$limit+1;
    for($i=1;$i<$n_pages;$i++){
      echo "
        <a href='T_Agglomerations.php?page=$i'>
          $i
        </a>
      ";
    }
  ?>
</div>

<script>
  new Vue({
    el:"#app",
    data:{
      table_name:"T_Agglomerations",
      table_definitions,
    },
    methods:{
      get_table(){
        return this.table_definitions.find(t=>t.name==this.table_name);
      },
      get_field_definition(field_name){
        let table = this.get_table();
        if(!table) return;
        let field = table.fields.find(f=>f.name==field_name);
        if(!field) return;
        return field.definition;
      },
    },
  });
</script>
