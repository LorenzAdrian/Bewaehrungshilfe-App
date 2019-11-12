<?php
if (!empty($_FILES['upload']['name']))
{
  $localFileName = 'uploads/' . $_FILES['upload']['name'];
  if (move_uploaded_file($_FILES['upload']['tmp_name'], $localFileName))
  {
    //Datei einlesen
    $content = file_get_contents($localFileName);

    //Verbindung zur MySQL-Datenbank
    $conn = new mysqli("localhost", "root", "", "bewaehrungshilfe");

    //Verbindung überprüfen
    if ($conn->connect_error) 
    {
      die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO fileupload (image) VALUES (0x" .  bin2hex($content) . ")";
    
    //Einfügen in Datenbank
    if ($conn->query($sql) == TRUE) 
    {
      echo "Bild angelegt ID = " . $conn->insert_id;      
    } else 
    {
      echo "Fehler: " . $sql . "<br>" . $conn->error;
      die();
    }

	unlink($localFileName);
    $conn->close();
  }
} else 
{
  echo '<b>kein Upload!</b>';
}
header("Location: MeineNachrichten.php");
?>