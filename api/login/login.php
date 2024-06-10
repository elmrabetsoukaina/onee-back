<?php 

require_once './api.php';
require_once './fonction.php';

// Vérifiez que la requête est une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données POST

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $username = isset($data['user']) ? $data['user'] : '';
    $password = isset($data['mdp']) ? $data['mdp'] : '';


    $reponse =  verify_user($pdo, $username, $password);

    $resultat['result'] = $reponse['result'];
    $resultat['infos'] = $reponse['infos'];
    $resultat['data'] = $reponse['data'];
    $resultat['is_auth'] = $reponse['is_auth'];
    // Retournez la réponse en JSON
    echo json_encode($resultat);
    die();

    
}
else {
    # code...
    // Si la requête n'est pas une requête POST, retourner une erreur
    http_response_code(405); // Méthode non autorisée
    echo json_encode(['error' => 'Méthode non autorisée']);
}

die();

?>