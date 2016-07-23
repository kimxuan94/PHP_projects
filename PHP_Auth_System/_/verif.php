        <?php
        session_start();
        $valid = false;


        // $_SESSION['login'] = $_POST['pseudo'];
        // $_SESSION['pwd'] = $_POST['pwd'];
        // $_SESSION['idsession'] = $row['id'];
        ini_set('display_errors', 1);

        //Déclare les variables
        $user = $_POST['pseudo'];
        $pass = md5($_POST['pwd']);
        // $idsession = $_SESSION['idsession'];
        // $valid = true;

        // if(isset($_POST['pseudo'])){
        //   echo 'Pseudo correct'.'<br />';
        // }
        // else {
        //   echo 'Désolé, votre identifiant est incorrect';
        // }
        //
        // if(isset($_POST['pwd'])){
        //   echo 'Mot de passe correct'.'<br />';
        // }
        // else {
        //   echo 'Désolé, votre mot de passe est incorrect';
        // }
        include 'conf.class.php';
        if($_POST['pseudo'] AND md5($_POST['pwd'] == $valid)){
          // echo 'good job';
          $pdo = confDB::connect();
          // $sql = $pdo->query("SELECT * FROM prive WHERE pseudo='$user'");
          $sql = "SELECT * FROM prive WHERE pseudo='$user' AND motdepasse='$pass'";
          foreach ($pdo->query($sql) as $row) {
          {
            if($_POST['pseudo'] == $row['pseudo']||$_POST['pwd'] == $row['motdepasse'] ){
              include('profil.php');

              // if($valid){
              //   $_SESSION['login'] = $_POST['pseudo'];
              //   $_SESSION['pwd'] = $_POST['pwd'];
              //   $_SESSION['idsession'] = $row['id'];
                // include('profil.php');

              }
              else {
                echo 'Vous netes pas connecte';
              }
            }
            // else {
            //   echo 'Utilisateur inconnu';
            // }

            // if(md5($_POST['pwd'] == $row['motdepasse'])){
            //   echo 'Ce mot de passe existe';
            // }
            // else {
            //   echo 'Aucun mot de passe trouvé';
            // }
          }
        }
          confDB::disconnect();
        }
        ?>
