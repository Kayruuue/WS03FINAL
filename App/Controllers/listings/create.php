<?php

$errors = [];
$listing = $_POST ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newListingId = createListing($_POST, $errors);

    if ($newListingId !== null) {
        redirect(appUrl('listings/' . $newListingId));
    }
}

LoadView('listings/create', [
    'errors' => $errors,
    'listing' => $listing,
]);
