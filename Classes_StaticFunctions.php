<?php

declare(strict_types=1);

//static functions
echo "Pont 1 static functions";

class Pont
{
    private float $longueur;

    public static function validerTaille(float $taille): bool{

        if ($taille < 50.0){
            trigger_error('La longeur est trop courte. (min 50m)', E_USER_ERROR);
        }
        return true;
    }
   

}


var_dump(Pont::validerTaille(60));
//var_dump(Pont::validerTaille(20)); 
var_dump(Pont::validerTaille(80)); 


//static functions
echo "Pont 2 static functions";

class Pont2
{
    private float $longueur;

    private static function validerTaille(float $taille): bool{

        if ($taille < 50.0){
            trigger_error('La longeur est trop courte. (min 50m)', E_USER_ERROR);
        }
        return true;
    }
   
    public function setLongueur(float $longueur): bool{

        //$this->validerTaille($longueur);
        
         // since its static, its same for all instances, 
         //hence can be accesses directly with "self::functionName()"
         self::validerTaille($longueur);
         Pont2::validerTaille($longueur);//same as first
        
         $this->longueur=$longueur;
        return true;
    }

}
   
$pont = new Pont2;
var_dump($pont->setLongueur(60));
//var_dump($pont->setLongueur(20)); 
var_dump($pont->setLongueur(80)); 


//pont 3

echo "Pont 3 static variables";

class Pont3
{
    public static int $nombrePietons=0;
       
    public function nouveauPieton(): void{
        self::$nombrePietons++;
    }

}
   
$pontLondres = new Pont3;
$pontLondres->nouveauPieton();


$pontManhattan = new Pont3;
$pontManhattan->nouveauPieton();

var_dump($pontLondres::$nombrePietons);
var_dump($pontManhattan::$nombrePietons);
var_dump(Pont3::$nombrePietons);


//pont 4 static variables constants unchangeables

echo "Pont 4 unchangeable static variables 'const'";

class Pont4
{
    private const UNITE = "m²";
    private float $longueur;
    private float $largueur;
    
    public function getSurface():string{
        return ($this->longueur * $this->largueur) . self::UNITE;
    }
    public function setLL(float $largueur,float $longueur){
        $this->longueur=$longueur;
        $this->largueur=$largueur;
        
    }
}
   
$towerBridge = new Pont4;
$towerBridge->setLL(15.0,286.0);

echo "</br>";
echo $towerBridge->getSurface();






?>