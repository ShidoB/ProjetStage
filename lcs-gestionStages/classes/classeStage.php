<?php
class User {
    public $id;
    public $username;
    public $role;

    public function __construct($id, $username, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
    }
}

class Stage {
    public $id;
    public $maitreStage;
    public $profRef;
    public $telMaitreStage;
    public $mailMaitreStage;
    public $descriptionStage;
    public $commentMaitreStage;
    public $adr;
    public $cP;
    public $ville;
    public $pays;
    public $conventionElevePDF;
    public $idEtudiant;
    public $idProf;
    public $idOrga;
    public $idPeriode;

    public function __construct($id, $maitreStage, $profRef, $telMaitreStage, $mailMaitreStage, $descriptionStage, $commentMaitreStage, $adr, $cP, $ville, $pays, $conventionElevePDF, $idEtudiant, $idProf, $idOrga, $idPeriode) {
        $this->id = $id;
        $this->maitreStage = $maitreStage;
        $this->profRef = $profRef;
        $this->telMaitreStage = $telMaitreStage;
        $this->mailMaitreStage = $mailMaitreStage;
        $this->descriptionStage = $descriptionStage;
        $this->commentMaitreStage = $commentMaitreStage;
        $this->adr = $adr;
        $this->cP = $cP;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->conventionElevePDF = $conventionElevePDF;
        $this->idEtudiant = $idEtudiant;
        $this->idProf = $idProf;
        $this->idOrga = $idOrga;
        $this->idPeriode = $idPeriode;
    }
}


?>
