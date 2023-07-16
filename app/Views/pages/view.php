<!DOCTYPE html>
<html>

<head>
    <title>Display Image</title>
</head>

<body>
    <img src="<?php echo site_url('dokumen/' . $file['id']); ?>" alt="Gambar"><embed src="<?php echo site_url('dokumen/' . $file['id']); ?>" width="100%" height="600px" type="application/pdf">
</body>

</html>