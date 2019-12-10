<table class="">
  <form class="" action="upload.php" method="POST" name="DAFORM" enctype="multipart/form-data" target="_self">
    <tr>
      <td>
       <!-- <input id="upload" name="upload" class="" type="file" >-->
	   
    <label for="file-upload" class="custom-file-upload">
    <i class="fa fa-cloud-upload"> </i> Datei hochladen
	</label>
	
	<input id="file-upload" id="dateien" name="upload" type="file"/> 

	<font id="file-anzeige"> </font>
	   
      </td>
    </tr>
    <tr>
      <td>
        <button id="bild-absenden" type="submit" class="btn btn-unsichtbar btn-sm float-right"><i data-feather="send"></i> &nbsp; Datei absenden</button>
      </td>
    </tr>
	
	 <tr>
      <td>
       	<output id="dateiListe"></output>
      </td>
    </tr>
  </form>
</table>
<script>
  feather.replace()
</script>
