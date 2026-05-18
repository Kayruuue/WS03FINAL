<?php
$keywords = trim($_GET['keywords'] ?? '');
$location = trim($_GET['location'] ?? '');
$listings = getListings(null, [
    'keywords' => $keywords,
    'location' => $location,
]);

LoadView('listings/index', [
    'listings' => $listings,
    'keywords' => $keywords,
    'location' => $location,
]);
