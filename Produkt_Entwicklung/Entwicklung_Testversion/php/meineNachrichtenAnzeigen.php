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
        echo '<table class="sender nachricht neu"><tr class="sendername"><td>'.$dsatz['vorname_sender'].' '.$dsatz['nachname_sender'].'</td></tr><tr class="nachricht"><td>'
            .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit sender"><td>'
            .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
        }
      //Wenn der Betreuer der Sender der schon gelesenen Nachricht ist.
      elseif($dsatz['BSender'] == 1)
        {
          echo '<table class="sender nachricht"><tr class="sendername"><td>'.$dsatz['vorname_sender'].' '.$dsatz['nachname_sender'].'</td></tr><tr class="nachricht"><td>'
              .$dsatz['Text'].'</td></tr><tr class="datumuhrzeit sender"><td>'
              .strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
        }
      //Wenn die Nachricht vom Probanden stammt.
      else
        {
          echo '<table class="empfaenger nachricht"><tr class="nachricht"><td>'.$dsatz['Text'].'</td></tr><tr class="datumuhrzeit empfaenger"><td>'
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
          echo '<table class="sender nachricht neu">
          <tr class="sendername"><td>'.$dsatz['vorname_sender'].' '.$dsatz['nachname_sender'].'</td></tr>
          <tr class="nachricht"><td><a href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
          <tr class="datumuhrzeit sender"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr></table>';
          }
        //Wenn der Betreuer der Sender der schon gelesenen Nachricht ist.
        elseif($dsatz['BSender'] == 1)
          {
            echo '<table class="sender nachricht">
            <tr class="sendername"><td>'.$dsatz['vorname_sender'].' '.$dsatz['nachname_sender'].'</td></tr>
            <tr class="nachricht"><td><a href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
            <tr class="datumuhrzeit sender"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr>
            </table>';
          }
        //Wenn die Nachricht vom Probanden stammt.
        else
          {
            echo '<table class="empfaenger nachricht">
            <tr class="nachricht"><td><a href="datei_download.php?nid='.$dsatz['NID'].'" download="'.$dsatz['dateiname'].'">'.$dsatz['dateiname'].'</a></td></tr>
            <tr class="datumuhrzeit empfaenger"><td>'.strftime('%a %e. %b %g, %H:%M', $datum).'</td></tr>
            </table>';

          }
      }
}
?>
