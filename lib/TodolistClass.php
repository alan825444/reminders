<?php
class NotifyData{
    private $ID;
    private $Event;
    private $Remark;
    private $Checked;
    private $Date;
    private $Time;

    public function __construct($ID,$Event,$Remark,$Checked,$Date,$Time)
    {
        $this->ID =$ID;
        $this->Event = $Event;
        $this->Remark = $Remark;
        $this->Checked = $Checked;
        $this->Date = $Date;
        $this->Time = $Time;
    }
}


