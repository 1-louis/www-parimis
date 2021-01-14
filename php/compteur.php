<?php
function ajouter_vue ():void{
    $fichier = dirname(__DIR__). DIRECTORY_SEPARATOR.'data'. DIRECTORY_SEPARATOR.'compteur';
    $fichier_journalier = $fichier.'-' .date('Y-m-d');
    
    incrementer_compteur( $fichier);
    incrementer_compteur($fichier_journalier);

}
function incrementer_compteur(string $fichier): void {
    $compteur = 1;
    if(file_exists($fichier)){
        $compteur = (int)file_get_contents($fichier);
        $compteur++;

    }
    file_put_contents($fichier, $compteur);
}
/*
function number_vues (): string {
    $fichier = dirname(__DIR__). DIRECTORY_SEPARATOR.'data'. DIRECTORY_SEPARATOR.'compteur';
    return file_get_contents($fichier);
}
*/

/*pour l'autre page
require_once(__DIR__).'function'. DIRECTORY_SEPARATOR. 'compteur.php';
ajouter_vue();
/*$vues = number_vues();
?>
il y a <?= $vues ?> visite <?php if ($vues>1): ?>s<?php endif;?> sur le site*/

?>
