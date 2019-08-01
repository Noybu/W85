<?php
//projecttype, description , loccity, locstreet , locnum, projectstatus, projectcurrentprice, userid
class Project
{

    public $projecttype;
    public $description;
    public $loccity;
    public $locstreet;
    public $locnum;
    public $projectstatus;
    public $projectprice;
    public $projectcurrentprice;
    public $userid;



    public function __construct($projecttype, $description, $loccity, $locstreet, $locnum, $projectstatus,$projectprice, $projectcurrentprice, $userid)
    {
        $this->projecttype = $projecttype;
        $this->description = $description;
        $this->loccity = $loccity;
        $this->locstreet = $locstreet;
        $this->locnum = $locnum;
        $this->projectstatus = $projectstatus;
        $this->projectprice = $projectprice;
        $this->projectcurrentprice = $projectcurrentprice;
        $this->userid = $userid;
    }


}
