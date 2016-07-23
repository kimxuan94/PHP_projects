<?php

class Contrat {

  //Database connection property object and table name property
  private $conn;
  private $table_name = "Contrats";

  //Create object properties of contrats
  public $no_contrat;
  public $idimmatveh;
  public $idmatrh;
  public $collaborateurs;
  public $vehicules;
  public $debut_contrat;
  public $fin_contrat;
  public $val_franchise;
  public $nbaccidents;
  public $pfranchise;
  public $dfranchise;
  public $tfranchise;
  public $qfranchise;
  public $commentaire;

  //Create contrat constructor
  public function __construct($db) {
    $this->conn = $db;
  }

  /**CREATE contrat**/
  function createContrat() {

      //Create query
      $query = "INSERT INTO " . $this->table_name . " values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(1, $this->no_contrat);
      $stmt->bindParam(2, $this->idimmatveh);
      $stmt->bindParam(3, $this->idmatrh);
      $stmt->bindParam(4, $this->collaborateurs);
      $stmt->bindParam(5, $this->vehicules);
      $stmt->bindParam(6, $this->debut_contrat);
      $stmt->bindParam(7, $this->fin_contrat);
      $stmt->bindParam(8, $this->val_franchise);
      $stmt->bindParam(9, $this->nbaccidents);
      $stmt->bindParam(10, $this->pfranchise);
      $stmt->bindParam(11, $this->dfranchise);
      $stmt->bindParam(12, $this->tfranchise);
      $stmt->bindParam(13, $this->qfranchise);
      $stmt->bindParam(14, $this->commentaire);

      if($stmt->execute()) {
        return true;
      } else {
        return false;
      }
  }

  /**READ contrats**/
  function readAll($page, $from_record_num, $records_per_page) {

      // $query = "SELECT * FROM " . $this->table_name . " ORDER BY no_contrat ASC LIMIT {$from_record_num}, {$records_per_page}";

      $query = "SELECT *,
                      DATE_FORMAT(debut_contrat, '%d/%m/%Y') as debut_contrat,
                      DATE_FORMAT(fin_contrat, '%d/%m/%Y') as fin_contrat
       FROM " . $this->table_name . "
                   GROUP BY no_contrat ASC LIMIT {$from_record_num}, {$records_per_page}";

      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt;
  }

  /**PAGINATION for contrat**/
    public function countAll(){

        $query = "SELECT no_contrat FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }

  /**READ contrat by ID after update**/
    function readContratID(){

        $query = "SELECT * FROM  " . $this->table_name . " WHERE no_contrat = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->no_contrat = $row['no_contrat'];
        $this->idimmatveh = $row['immatricule_id'];
        $this->idmatrh = $row['matricule_id'];
        $this->collaborateurs = $row['l_collaborateurs'];
        $this->vehicules = $row['l_vehicules'];
        $this->debut_contrat = $row['debut_contrat'];
        $this->fin_contrat = $row['fin_contrat'];
        $this->val_franchise = $row['val_franchise'];
        $this->nbaccidents = $row['nb_accidents'];
        $this->pfranchise = $row['prem_franchise_accident'];
        $this->dfranchise = $row['deux_franchise_accident'];
        $this->tfranchise = $row['troi_franchise_accident'];
        $this->qfranchise = $row['quat_franchise_accident'];
        $this->commentaire = $row['commentaires'];

    }

    /**UPDATE for contrat**/
    function updateContrat(){
      $query = "UPDATE " . $this->table_name . "
      SET
        no_contrat = :nocontrat
        immatricule_id = :immatveh,
        matricule_id = :matrh,
        l_collaborateurs = :lcol,
        l_vehicules = :lveh,
        debut_contrat = :deb,
        fin_contrat = :fin,
        val_franchise = :vfra,
        nb_accidents = :nbacc,
        prem_franchise_accident = :fr1,
        deux_franchise_accident = :fr2,
        troi_franchise_accident = :fr3,
        quat_franchise_accident = :fr4,
        commentaires = :com

     WHERE
       no_contrat = :nocontrat";

     $stmt = $this->conn->prepare($query);

     $stmt->bindParam(':nocontrat', $this->no_contrat);
     $stmt->bindParam(':immatveh', $this->idimmatveh);
     $stmt->bindParam(':matrh', $this->idmatrh);
     $stmt->bindParam(':lcol', $this->collaborateurs);
     $stmt->bindParam(':lveh', $this->vehicules);
     $stmt->bindParam(':deb', $this->debut_contrat);
     $stmt->bindParam(':fin', $this->fin_contrat);
     $stmt->bindParam(':vfra', $this->val_franchise);
     $stmt->bindParam(':nbacc', $this->nbaccidents);
     $stmt->bindParam(':fr1', $this->pfranchise);
     $stmt->bindParam(':fr2', $this->dfranchise);
     $stmt->bindParam(':fr3', $this->tfranchise);
     $stmt->bindParam(':fr4', $this->qfranchise);
     $stmt->bindParam(':com', $this->commentaire);

     //Execute update query
     if ($stmt->execute()) {
       return true;
     } else {
        return false;
     }
    }

    /**DELETE contrat by ID**/
    function deleteContrat()
    {

        $query = "DELETE FROM " . $this->table_name . " WHERE no_contrat = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($result = $stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Récupère tous les matricules RH dans la la liste matricules
}//End of class
?>
