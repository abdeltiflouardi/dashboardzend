<?php

class Application_Model_Usages extends Application_Model_BaseModels
{
    private $usageID;
    private $usageName;
    
    public function getUsageID()
    {
        return $this->usageID;
    }

    public function setUsageID($usageID)
    {
        $this->usageID = $usageID;
        
        return $this;
    }

    public function getUsageName()
    {
        return $this->usageName;
    }

    public function setUsageName($usageName)
    {
        $this->usageName = $usageName;
        
        return $this;
    }

}

