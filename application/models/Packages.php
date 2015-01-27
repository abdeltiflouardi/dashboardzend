<?php

class Application_Model_Packages extends Application_Model_BaseModels
{

    private $packageID;
    private $assuranceID;
    private $assureurID;
    private $usageID;
    private $packageName;
    private $packagePrime;
    private $packageCible;
    private $packageSpecification;
    private $packageConditionSouscription;
    private $packageAvantage;
    private $packageEnabled;
    private $garanties;

    public function getPackageID()
    {
        return $this->packageID;
    }

    public function setPackageID($packageID)
    {
        $this->packageID = $packageID;

        return $this;
    }

    public function getAssuranceID()
    {
        return $this->assuranceID;
    }

    public function setAssuranceID($assuranceID)
    {
        $this->assuranceID = $assuranceID;

        return $this;
    }

    public function getAssureurID()
    {
        return $this->assureurID;
    }

    public function setAssureurID($assureurID)
    {
        $this->assureurID = $assureurID;

        return $this;
    }

    public function getUsageID()
    {
        return $this->usageID;
    }

    public function setUsageID($usageID)
    {
        $this->usageID = $usageID;

        return $this;
    }

    public function getPackageName()
    {
        return $this->packageName;
    }

    public function setPackageName($packageName)
    {
        $this->packageName = $packageName;

        return $this;
    }

    public function getPackagePrime()
    {
        return $this->packagePrime;
    }

    public function setPackagePrime($packagePrime)
    {
        $this->packagePrime = $packagePrime;
        
        return $this;
    }

    public function getPackageCible()
    {
        return $this->packageCible;
    }

    public function setPackageCible($packageCible)
    {
        $this->packageCible = $packageCible;

        return $this;
    }

    public function getPackageSpecification()
    {
        return $this->packageSpecification;
    }

    public function setPackageSpecification($packageSpecification)
    {
        $this->packageSpecification = $packageSpecification;

        return $this;
    }

    public function getPackageConditionSouscription()
    {
        return $this->packageConditionSouscription;
    }

    public function setPackageConditionSouscription($packageConditionSouscription)
    {
        $this->packageConditionSouscription = $packageConditionSouscription;

        return $this;
    }

    public function getPackageAvantage()
    {
        return $this->packageAvantage;
    }

    public function setPackageAvantage($packageAvantage)
    {
        $this->packageAvantage = $packageAvantage;

        return $this;
    }

    public function getPackageEnabled()
    {
        return $this->packageEnabled;
    }

    public function setPackageEnabled($packageEnabled)
    {
        $this->packageEnabled = $packageEnabled;
        
        return $this;
    }

    public function getGaranties()
    {
        return $this->garanties;
    }

    public function setGaranties($garanties)
    {
        $this->garanties = $garanties;
    }

}

