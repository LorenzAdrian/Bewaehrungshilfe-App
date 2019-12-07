<table class="">
  <form class="" action="upload.php" method="POST" name="DAFORM" enctype="multipart/form-data" target="_self">
    <tr>
      <td>
        <input id="upload" name="upload" class="" type="file" >
         <input id="terPID" name="hiddenProbID" type='hidden' value="<?php echo $probID?>">
      </td>
    </tr>
    <tr>
      <td>
        <button type="submit" class="">Absenden</button>
      </td>
    </tr>
  </form>
</table>
