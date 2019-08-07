<?php

class Bid
{

    public $id;
    public $projectid;
    public $serviceid;
    public $offerprice;
    public $offerdate;
    public $win;

    public $proftype;
    public $numofyears;
    public $firstname;
    public $lastname;





    public function __construct($id, $projectid, $serviceid, $offerprice, $offerdate, $win,$proftype,$numofyears,$firstname,$lastname)
    {
        $this->id= $id;
        $this->projectid=$projectid;
        $this->serviceid=$serviceid;
        $this->offerprice=$offerprice;
        $this->offerdate=$offerdate;
        $this->win=$win;
        $this->proftype=$proftype;
        $this->numofyears=$numofyears;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
    

    }


}
