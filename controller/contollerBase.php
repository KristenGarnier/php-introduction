<?php
abstract class ContollerBase // On utilise ici une classe abstraite car elle sert de base à certaines autres, elle ne sera jamais instanciée seule
{
    protected $model; // protected donne le doit aux enfants de la classe de gérer ce pramètre

    public function __construct($model) { // On récupère le modèle à l'initailisation et le renseigne dans une propeiété
        $this->model = $model;
    }

    protected function render($template, $params = []) { // Pareil pour cette fonction
        // Dans cette fonction le premier argument et le nom du template, le deuxième est un tableau de paramètres à faire passer à la vue
        if($template === '404') {
            header("HTTP/1.0 404 Not Found"); // Si on veut afficher une page 404, on utilise le bon header
        }

        ob_start(); // On commence l'enregistrement dans un buffer pour en savoir plus: https://openclassrooms.com/fr/courses/1116186-la-tamporisation-de-sortie-en-php
        include __DIR__ . '/../view/'. $template . '.php';  // On inclur le template voulu
        ob_end_flush(); // On ferme le buffer et envoie à l'utilisateur le contenu;
        die; // on coupe le script pour être sur que rien ne se passe après
    }
}