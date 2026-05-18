<?php

$routeParams = $GLOBALS['routeParams'] ?? [];
$listingId = $routeParams['id'] ?? ($_GET['id'] ?? null);
$listing = $listingId ? findListing($listingId) : null;

if (!$listing) {
    require basePath('App/Controllers/Error/404.php');
    return;
}

LoadView('listings/show', [
    'listing' => $listing,
]);
