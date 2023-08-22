<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jorge Cataño">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Invar Serapis - Intranet</title>
    <style>
      .navbar { background-color: #21618c; color: #fff !important; }
      .navbar-brand { color: #fff !important; }
      html { min-height: 100%; position: relative;}
      body { margin: 0; margin-bottom: 60px; }
      footer { background-color: #21618c; position: absolute; bottom: 0; width: 100%; height: 40px; color: #fff; text-align:center; padding:5px; }
      a {text-decoration: none !important; }
    </style>
  </head>
  <body>

<?php 
include './navbar.php';
if( isset($_POST['search']) ) $search = $_POST['search'];

$lists_json = file_get_contents('list.json');
$lists = json_decode( $lists_json , false );

if(isset($search) && $search != ""){
  include './search.php';
}else{
  include './acordion.php';
}
?>

  <footer>
    Poster Docs |  Last update <?php echo date("d/m/Y",filemtime('./list.json')); ?> <br>
  </footer>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>