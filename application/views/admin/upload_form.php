<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" size="20" name = "file" id = "file" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>