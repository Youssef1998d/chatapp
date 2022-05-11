<?php
class medecin{
    private const id = null;
    private const nom = null;
    private const type = null;
    private const numtel = null;
    function __construct(string $nom,string $type,int $numtel)
    {
        
        $this->nom=$nom;
        $this->type=$type;
        $this->numtel=$numtel;
    }
    function getId(): int{
        return $this->id;
    }
    function getType(): string{
        return $this->type;
    }
   
    function getNom(): string{
        return $this->nom;
    }
    
    function getNumtel(): int{
        return $this->numtel;
    }
  
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    
    function setType(string $type): void{
        $this->type=$type;
    }
    function setNumtel(int $numtel): void{
        $this->numtel=$numtel;
    }
   
}
?>