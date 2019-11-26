<?PHP
require '../database/dbh.inc.php';
$nid = $_GET['nid'];
$result = mysqli_query($conn, "SELECT image FROM nachricht WHERE NID = $nid");
while($dsatz = mysqli_fetch_assoc($result))
{
  echo $dsatz['image'];
}
mysqli_close($conn);
?>
