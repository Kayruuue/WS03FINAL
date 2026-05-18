<?php

$routeParams = $GLOBALS['routeParams'] ?? [];
$listingId = $routeParams['id'] ?? ($_GET['id'] ?? null);
$listing = $listingId ? findListing($listingId) : null;

if (!$listing) {
    require basePath('controllers/error/404.php');
    return;
}

LoadView('listings/show', [
    'listing' => $listing,
]);
