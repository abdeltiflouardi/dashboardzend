<?php

class Application_Model_Souscripteurs extends Application_Model_BaseModels
{

    private $souscripteurID;
    private $souscripteurCivilite;
    private $souscripteurCIN;
    private $souscripteurNom;
    private $souscripteurPrenom;
    private $souscripteurDateNaissance;
    private $souscripteurProfession;
    private $souscripteurSecteurActivite;
    private $souscripteurTelephoneFix;
    private $souscripteurTelephonePortable;
    private $souscripteurFax;
    private $souscripteurAdresse;
    private $souscripteurProvince;
    private $souscripteurVille;
    private $souscripteurCodePostale;
    private $souscripteurEmail;
    private $souscripteurPassword;
    private $souscripteurDateObtentionPermis;
    private $souscripteurClassePermis;
    private $souscripteurNewsletter;

    public function getSouscripteurID()
    {
        return $this->souscripteurID;
    }

    public function setSouscripteurID($souscripteurID)
    {
        $this->souscripteurID = $souscripteurID;
    }

    public function getSouscripteurCivilite()
    {
        return $this->souscripteurCivilite;
    }

    public function setSouscripteurCivilite($souscripteurCivilite)
    {
        $this->souscripteurCivilite = $souscripteurCivilite;
    }

    public function getSouscripteurCIN()
    {
        return $this->souscripteurCIN;
    }

    public function setSouscripteurCIN($souscripteurCIN)
    {
        $this->souscripteurCIN = $souscripteurCIN;
    }

    public function getSouscripteurNom()
    {
        return $this->souscripteurNom;
    }

    public function setSouscripteurNom($souscripteurNom)
    {
        $this->souscripteurNom = $souscripteurNom;
    }

    public function getSouscripteurPrenom()
    {
        return $this->souscripteurPrenom;
    }

    public function setSouscripteurPrenom($souscripteurPrenom)
    {
        $this->souscripteurPrenom = $souscripteurPrenom;
    }

    public function getSouscripteurDateNaissance()
    {
        return $this->souscripteurDateNaissance;
    }

    public function setSouscripteurDateNaissance($souscripteurDateNaissance)
    {
        $this->souscripteurDateNaissance = $souscripteurDateNaissance;
    }

    public function getSouscripteurProfession()
    {
        return $this->souscripteurProfession;
    }

    public function setSouscripteurProfession($souscripteurProfession)
    {
        $this->souscripteurProfession = $souscripteurProfession;
    }

    public function getSouscripteurSecteurActivite()
    {
        return $this->souscripteurSecteurActivite;
    }

    public function setSouscripteurSecteurActivite($souscripteurSecteurActivite)
    {
        $this->souscripteurSecteurActivite = $souscripteurSecteurActivite;
    }

    public function getSouscripteurTelephoneFix()
    {
        return $this->souscripteurTelephoneFix;
    }

    public function setSouscripteurTelephoneFix($souscripteurTelephoneFix)
    {
        $this->souscripteurTelephoneFix = $souscripteurTelephoneFix;
    }

    public function getSouscripteurTelephonePortable()
    {
        return $this->souscripteurTelephonePortable;
    }

    public function setSouscripteurTelephonePortable($souscripteurTelephonePortable)
    {
        $this->souscripteurTelephonePortable = $souscripteurTelephonePortable;
    }

    public function getSouscripteurFax()
    {
        return $this->souscripteurFax;
    }

    public function setSouscripteurFax($souscripteurFax)
    {
        $this->souscripteurFax = $souscripteurFax;
    }

    public function getSouscripteurAdresse()
    {
        return $this->souscripteurAdresse;
    }

    public function setSouscripteurAdresse($souscripteurAdresse)
    {
        $this->souscripteurAdresse = $souscripteurAdresse;
    }

    public function getSouscripteurProvince()
    {
        return $this->souscripteurProvince;
    }

    public function setSouscripteurProvince($souscripteurProvince)
    {
        $this->souscripteurProvince = $souscripteurProvince;
    }

    public function getSouscripteurVille()
    {
        return $this->souscripteurVille;
    }

    public function setSouscripteurVille($souscripteurVille)
    {
        $this->souscripteurVille = $souscripteurVille;
    }

    public function getSouscripteurCodePostale()
    {
        return $this->souscripteurCodePostale;
    }

    public function setSouscripteurCodePostale($souscripteurCodePostale)
    {
        $this->souscripteurCodePostale = $souscripteurCodePostale;
    }

    public function getSouscripteurEmail()
    {
        return $this->souscripteurEmail;
    }

    public function setSouscripteurEmail($souscripteurEmail)
    {
        $this->souscripteurEmail = $souscripteurEmail;
    }

    public function getSouscripteurPassword()
    {
        return $this->souscripteurPassword;
    }

    public function setSouscripteurPassword($souscripteurPassword)
    {
        $this->souscripteurPassword = $souscripteurPassword;
    }

    public function getSouscripteurDateObtentionPermis()
    {
        return $this->souscripteurDateObtentionPermis;
    }

    public function setSouscripteurDateObtentionPermis($souscripteurDateObtentionPermis)
    {
        $this->souscripteurDateObtentionPermis = $souscripteurDateObtentionPermis;
    }

    public function getSouscripteurClassePermis()
    {
        return $this->souscripteurClassePermis;
    }

    public function setSouscripteurClassePermis($souscripteurClassePermis)
    {
        $this->souscripteurClassePermis = $souscripteurClassePermis;
    }

    public function getSouscripteurNewsletter()
    {
        return $this->souscripteurNewsletter;
    }

    public function setSouscripteurNewsletter($souscripteurNewsletter)
    {
        $this->souscripteurNewsletter = $souscripteurNewsletter;
    }

}

