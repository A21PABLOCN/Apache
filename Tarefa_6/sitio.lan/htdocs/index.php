<html>

<head>
  <title>
    <?php echo "Sitio Web #1 en ${_SERVER['SERVER_ADDR']}"?>
  </title>
</head>

<body>
  <h1>Sitio Web #1</h1>

  <?php echo "Est&aacute;s en ${_SERVER['SERVER_ADDR']}" ?>
  <br />
  <?php echo "Enderezo IP do cliente ${_SERVER['REMOTE_ADDR']}"?>
</body>

</html>