<?php
  /*
    main page: list all tables from the database
  */
  include'load_db.php';
?>
<!doctype html><html><head>
  <script src="table_definitions.js"></script>
  <script src="lib/vue.js"></script>
  <meta charset=utf8>
  <title>UWWTD v8 GUI</title>
</head><body>

<!--navbar-->
<nav>
  <a href="https://www.eea.europa.eu/data-and-maps/data/waterbase-uwwtd-urban-waste-water-treatment-directive-7" target=_blank>eea.europa.eu</a> |
  <a href="https://github.com/icra/uwwtd-gui/" target=_blank>github/icra/uwwtd-gui</a> |
  <a href="db/phpliteadmin.php" target=_blank>phpLiteAdmin</a> |
</nav><hr>

<!--title-->
<h1>UWWTD v8 database GUI</h1>

<!--number of tables-->
<?php
  $sql="SELECT COUNT(*) FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'";
  $n_tables = current($db->query($sql)->fetchArray(SQLITE3_ASSOC));
  echo "<p>The database has $n_tables tables</p>";
?>

<!--list all tables-->
<div id=app>
  <table border=1>
    <tr>
      <th>Table name
      <th>rows
      <th>description
    </tr>
    <?php
      $sql="SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' ORDER BY name";
      $res=$db->query($sql);
      while($row=$res->fetchArray(SQLITE3_ASSOC)){
        $obj = (object)$row; //convert to object
        $n_rows = current($db->query("SELECT COUNT(*) FROM $obj->name")->fetchArray(SQLITE3_ASSOC));
        echo "<tr>";

        if(file_exists("$obj->name.php")){
          echo"
            <td>
              <a href='$obj->name.php'>$obj->name</a>
            </td>
          ";
        }else{
          echo"
            <td>
              $obj->name
            </td>
          ";
        }

        echo"
          <td>
            $n_rows
          </td>
          <td>
            <small>
              {{ get_table_description('$obj->name') }}
            </small>
          </td>
        ";
      }
    ?>
  </table>
</div><hr>

<!--footer-->
<small>
  <?php
    $sqlite_version = SQLite3::version()['versionString'];
    echo "SQLite version $sqlite_version";
  ?>
</small>

<!--vue object to link tables with "table_definitions.js"-->
<script>
  new Vue({
    el:"#app",
    data:{
      table_definitions, //from "table_definitions.js"
    },
    methods:{
      get_table_description(table_name){
        let table = this.table_definitions.find(t=>t.name==table_name);
        return table ? table.description : "";
      },
    },
  });
</script>
