<?php

require_once 'vendor/autoload.php';

// Mettez votre clé secrète Stripe ici
$stripe_secret = $_ENV["STRIPE_SECRET"];

\Stripe\Stripe::setApiKey($stripe_secret);

// Vérifiez si le montant du don est passé en POST
if (isset($_POST['amount']) && is_numeric($_POST['amount'])) {
    $amount = $_POST['amount'];
} else {
    // Redirigez l'utilisateur s'il n'a pas spécifié le montant du don
    header('Location: index.php');
    exit;
}

try {
    // Créez une session de paiement avec Stripe
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'gbp',
                'unit_amount' => $amount * 100, // Convertir le montant en cents
                'product_data' => [
                    'name' => 'Donation', // Nom du produit affiché dans Stripe
                ],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => "http://localhost$localhost/success", // URL de redirection en cas de succès
        'cancel_url' => "http://localhost$localhost/help-us", // URL de redirection en cas d'annulation
    ]);

    // Redirigez l'utilisateur vers la page de paiement de Stripe
    header('Location: ' . $session->url);
    exit;
} catch (Exception $e) {
    // Gérez les erreurs
    echo 'Une erreur s\'est produite : ' . $e->getMessage();
}
