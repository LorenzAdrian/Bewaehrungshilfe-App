<?php
while ($dsatz = mysqli_fetch_assoc($result))
{
  //Erzeugt aus der Zeichenkette des Zeitstempels ein DateTime-Objekt
  setlocale(LC_ALL, "");
  $datum = date_create($dsatz['Zeitstempel'])->getTimestamp();

  //Wenn die Nachricht ein String ist
  if(!$dsatz['dateiname']){
  //Wenn der Betreuer der Sender der Nachricht und die Nachricht neu ist.
    if($dsatz['BSender'] == 1 && $dsatz['Status'] == 'neu')
      {
        echo '<table class="betreuer nachricht neu"><tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr><tr class="nachricht"><td>'
            .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit betreuer"><td>'
            .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
        }
      //Wenn der Betreuer der Sender der schon gelesenen Nachricht ist.
      elseif($dsatz['BSender'] == 1)
        {
          echo '<table class="betreuer nachricht"><tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr><tr class="nachricht"><td>'
              .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit betreuer"><td>'
              .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
        }
      //Wenn die Nachricht vom Probanden stammt.
      else
        {
          echo '<table class="proband nachricht"><tr class="nachricht"><td>'.$dsatz['Text'].'</td></tr><tr class="datumuhrzeit proband"><td>'
          .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
        }
    }
    //Wenn die Nachricht eine Datei ist
    else{
    //Wenn der Betreuer der Sender der Nachricht und die Nachricht neu ist.
    //$filename = $dsatz['dateiname'];
    //file_put_contents($filename,$dsatz['image']);
      if($dsatz['BSender'] == 1 && $dsatz['Status'] == 'neu')
        {
          echo '<table class="betreuer nachricht neu">
          <tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr>
          <tr class="nachricht"><td><a href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
          <tr class="datumuhrzeit betreuer"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
          }
        //Wenn der Betreuer der Sender der schon gelesenen Nachricht ist.
        elseif($dsatz['BSender'] == 1)
          {
            echo '<table class="betreuer nachricht">
            <tr class="betreuername"><td>'.$dsatz['vorname_betreuer'].' '.$dsatz['nachname_betreuer'].'</td></tr>
            <tr class="nachricht"><td><a href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
            <tr class="datumuhrzeit betreuer"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr>
            </table>';
          }
        //Wenn die Nachricht vom Probanden stammt.
        else
          {
            echo '<table class="proband nachricht">
            <tr class="nachricht"><td><a href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
            <tr class="datumuhrzeit proband"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr>
            </table>';

          }
      }
}
?>
