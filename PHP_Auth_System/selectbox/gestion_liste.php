<?php
  ini_set('display_errors', 1);
  require('../conf.class.php');

?>
<!DOCTYPE html>
  <head>
  <title>Gestion de listes</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body>
    <style>
    .selectwidthauto
    {
      width:auto !important;
    }

    body {
      text-align: center;
    }

    .col-xs-2 {
      margin: 21px 620px auto;
    }

    .hidden {
    display: none;
    }
    </style>
  <h1>Mon système de gestion de listes</h1>

  <form id="infos" action="get_liste.php" method="POST">
    <legend>Selectbox + input:</legend>
      <p><label>Niveau d'étude: </label>
        <div class="row">
          <div class="col-xs-2">
            <select id="etudes" class="form-control">
             <option value="">Selectionnez votre niveau</option>
             <option value="bac">BAC</option>
             <option value="universite">Université</option>
             <option value="alternance">Alternance</option>
             <option value="autre">Autre</option>
           </select>
      </p>
      <div id="autreetude">Autre etude
        <input name="autre_etude" class="form-control" id="inputdefault" type="text">
      </div>
    </div>
  </div>
  <br />
  <p><button type="submit" class="btn btn-default">Envoyer</button></p>
  </form>

  <script type="text/javascript">
  //Creation de l'input caché
  document.getElementById('autreetude').classList.add('hidden');

  //Récupération du formulaire
  var form = document.getElementById('infos');

  /*Changement d'état si c'est le dernier index on applique la condition
  d'afffichage de l'input*/
  form.elements.etudes.onchange = function () {
    var selectedOption = this.options[this.selectedIndex],
        autreEtude = document.getElementById('autreetude');

    //Affichage l'input si l'option autre est selectionnée
    if (selectedOption.value === 'autre') {
        autreEtude.classList.remove('hidden');
    } else {
        autreEtude.classList.add('hidden');
    }
  };
  </script>
  </body>
</html>
