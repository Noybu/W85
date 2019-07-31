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
    public $projectcurrentprice;
    public $userid;



    public function __construct($projecttype, $description, $loccity, $locstreet, $locnum, $projectstatus, $projectcurrentprice, $userid)
    {
        $this->projecttype = $projecttype;
        $this->description = $description;
        $this->loccity = $loccity;
        $this->locstreet = $locstreet;
        $this->locnum = $locnum;
        $this->projectstatus = $projectstatus;
        $this->projectcurrentprice = $projectcurrentprice;
        $this->userid = $userid;
    }

    public function get_des()
    {
        return $this->description;
    }
}
