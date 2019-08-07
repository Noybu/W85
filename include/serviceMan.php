<?php
//$id, $firstName, $lastName, $email, $idservice, $proftype, $numofyears, $idfile, $proffile, $type
class ServiceMan
{

    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $idservice;
    public $proftype;
    public $numofyears;
    public $idfile;
    public $proffile;
    public $type;
    public $approved;




    public function __construct($id, $firstName, $lastName, $email, $idservice, $proftype, $numofyears, $idfile, $proffile, $type, $approved)
    {
        $this->id -> $id;
        $this->firstName->$firstName;
        $this->lastName->$lastName;
        $this->email->$email;
        $this->idservice->$idservice;
        $this->proftype->$proftype;
        $this->numofyears->$numofyears;
        $this->idfile->$idfile;
        $this->proffile->$proffile;
        $this->type->$type;
        $this->approved->$approved;

    }


}
