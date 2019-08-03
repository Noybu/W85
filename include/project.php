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
    public $projectcost;
    public $projectcurrentprice;
    public $userid;
    public $projectid;



    public function __construct($projecttype, $description, $loccity, $locstreet, $locnum, $projectstatus,$projectcost, $projectcurrentprice, $userid, $projectid)
    {
        $this->projecttype = $projecttype;
        $this->description = $description;
        $this->loccity = $loccity;
        $this->locstreet = $locstreet;
        $this->locnum = $locnum;
        $this->projectstatus = $projectstatus;
        $this->projectcost = $projectcost;
        $this->projectcurrentprice = $projectcurrentprice;
        $this->userid = $userid;
        $this->projectid=$projectid;
    }


}
