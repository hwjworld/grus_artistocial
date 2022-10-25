<?php

$artsy_api_base = 'https://api.artsy.net';

$artsy_token_api_url = $artsy_api_base .'/api/tokens/xapp_token';
$artsy_gene_api_url = $artsy_api_base . '/api/genes/';
/**
 * params {?artist_id,partner_id,show_id,similar_to_artwork_id,published,term,total_count,size,cursor,offset,sample,sort}
 * 
 * ?gene_id
 */
$artsy_artwork_api_url = $artsy_api_base . '/api/artworks/';

/**
 * {?artwork_id,similar_to_artist_id,similarity_type,published_artworks,artworks,term,total_count,size,cursor,offset,sample,sort}",
 * 
 * ?artwork_id=4d8b92eb4eb68a1b2c000968"
 */
$artsy_artist_api_url = $artsy_api_base . '/api/artists';

$bne_data_base_url = 'https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search';
$bne_api_url_art_collection = $bne_data_base_url . '?resource_id=3c972b8e-9340-4b6d-8c7b-2ed988aa3343&limit=200';
$bne_api_url_event_location = $bne_data_base_url . '?resource_id=08107e61-5960-4b3c-a9c9-468d6d295020&limit=2000';

$qld_data_base_url = 'https://www.data.qld.gov.au/api/3/action/datastore_search';
$qld_api_url_library = $qld_data_base_url . '?resource_id=b6cddba1-5084-4b40-a222-de885d59d617&limit=1000';

$bne_api_url_event = 'https://www.trumba.com/calendars/brisbane-city-council.json';

// built-in user picture
$profilepicurls = [
    "/grus_artistocial/websrc/statics/profilepics/01.jpg",
    "/grus_artistocial/websrc/statics/profilepics/02.jpg",
    "/grus_artistocial/websrc/statics/profilepics/03.jpg",
    "/grus_artistocial/websrc/statics/profilepics/04.jpg",
    "/grus_artistocial/websrc/statics/profilepics/05.jpg",
    "/grus_artistocial/websrc/statics/profilepics/06.jpg",
    "/grus_artistocial/websrc/statics/profilepics/07.jpg"
];

$arttypes = [
    'Architecture',
    'Books and Portfolios',
    'Design/Decorative Art',
    'Drawing, Collage or other Work on Paper',
    'Mixed Media',
    'Other',
    'Painting',
    'Photography',
    'Posters',
    'Print',
    'Sculpture',
    'Textile Arts'
];

$website_base_home_url = "/grus_artistocial/websrc/";

$arttype_artcollectionarttype_match = [
    'Architecture'=>["bronze"]
];

$arttype_eventarttype_match = [
    'Architecture'=>["Art, Creative, Culture, Exhibitions, Free"]
];

?>