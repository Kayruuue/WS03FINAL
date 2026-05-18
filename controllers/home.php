<?php
$listings = getListings(6);

LoadView('home', [
    'listings' => $listings,
]);
