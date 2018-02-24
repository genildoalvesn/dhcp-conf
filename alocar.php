<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="css/master.css" rel="stylesheet">

    <title>DHCP Config</title>
  </head>
  <body>
    <?php include("navbar.php") ?>

    <div class="container">
      <h2>Alocar Endereço IP</h2>
      <form>
        <div class="row">
          <div class="form-group col">
            <label for="host">Hostname</label>
            <input type="text" class="form-control" id="host" placeholder="Nome da máquina">
          </div>
          <div class="form-group col">
            <label for="setor">Setor</label>
            <input type="text" class="form-control" id="setor" placeholder="Nome do setor">
          </div>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="mac">Endereço MAC</label>
            <input type="text" class="form-control" id="mac" placeholder="00:00:00:00:00:00">
          </div>
          <div class="form-group col">
            <label for="ip">Endereço IP</label>
            <input type="text" class="form-control" id="ip" placeholder="000.000.000.000">
          </div>
        </div>
        <div class="form-group">
          <label for="comment">Comentário</label>
          <textarea class="form-control" id="comment" placeholder="Digite um comentário..."></textarea>
        </div>
        <div class="form-group">
          <input type="button" class="btn btn-default" id="submit" value="Alocar">
        </div>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/alocar.js"></script>
  </body>
</html>
