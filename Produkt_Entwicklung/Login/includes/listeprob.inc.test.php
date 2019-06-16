<pre>
 <html>
  <head>
      <title>Title</title>
    <!--  <style type="text/css">
     #testid{
          float:left;
      }
      </style>
  </head>
  <body>
    <div id="testid">-->
<?php

//if(isset($_POST['list-prob'])) {
$servername = "localhost";
$username = "root";
$password = "";
$dbName="loginsystemtest";

try {
    //$conn = new PDO("mysql:host=$servername;dbname=loginsystemtest", $username, $password);
    // set the PDO error mode to exception
  //  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    $conn = mysqli_connect($servername,$username,$password,$dbName);

    if (!$conn) {
      die("Connection Failed!!".mysqli_connect_error());
        }
        $testarray = array();

  $sql = "SELECT * FROM prob";
  $result=mysqli_query($conn,$sql);
  while($row = $result->fetch_assoc()) {
  //  echo "ID: ".$row['ID']."<br />";
     //echo "Vorname: ".$row['Vorname']."<br />";
     //echo "Nachname: ".$row['Nachname']."<br />";
     //echo "Geburtsdatum: ".$row['Geburtsdatum']."<br /><br />";
    // echo "BetreuerGruppe: ".$row['BetreuerGruppe']."<br /><br />";
    $testarray[]= $row;


if (empty($testarray)) {
  echo "FAIL";

}

 }
 echo"<form>";
 //echo "<table>";
 echo"<select name=\"Probanden\" size=\"6\">";
 foreach($testarray as $testtest){
// echo "<a href=\"https://www.google.de\" target=\"blank\">".$testtest['Vorname']." ".$testtest['Nachname']."</a><br></br>";
//echo "<tr>";
echo "<option>".$testtest['Vorname']." ".$testtest['Nachname']."</option>";
//echo "<td>".$testtest['Nachname']."</td>";
//echo "</tr>";
 }
 
  echo"</select>";
  echo"</form>";
//echo "</table>";
 //print_r($testarray);
//  $resulttest=mysqli_fetch_assoc($result);
  //$resultarray=mysqli_fetch_array($result);



//foreach ($conn->query($sql) as $row) {

  // echo "<div id='test'>ID: ".$row['ID']."</div><br />";
  // echo "Vorname: <div id='test'>".$row['Vorname']."</div><br />";
  // echo "Nachname: <div id='test'>".$row['Nachname']."</div><br />";
  // echo "Geburtsdatum: <div id='test'>".$row['Geburtsdatum']."</div><br /><br />";
  // echo "BetreuerGruppe: ".$row['BetreuerGruppe']."<br /><br />";

//}

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
//  }
//  else{

//echo 'FAIL';

//  }

?>
<!--</div>-->
</body>
</html>
</pre>
