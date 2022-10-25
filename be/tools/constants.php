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
    'Architecture'=>[
        'concrete',
        'concrete, aluminium',
        'concrete, mosaic',
        'concrete, paint',
        'found metals, concrete',
        'stainless steel, concrete, aluminium'
    ],
    'Books and Portfolios'=>[
        'aluminium',
        'Aluminium and automative spray paint',
        'aluminium, brass, ceramic, copper',
        'aluminium, paint',
        'aluminium, synthetic polymer',
        'brass',
        'brass, organics',
        'bronze',
        'bronze and automotive paint',
        'bronze, native Ficus',
        'bronze, sandstone',
        'cast aluminium',
        'cement',
        'ceramic',
        'ceramic, cement',
        'concrete',
        'concrete, aluminium',
        'concrete, mosaic',
        'concrete, paint',
        'copper, bronze, stainless steel, lighting',
        'copper, glass',
        'epoxy resin, slate powder, fibregass and steel',
        'fibreglass',
        'found metals',
        'found metals, concrete',
        'found metals, granite',
        'granite',
        'lighting',
        'marble',
        'neon',
        'paint',
        'sandstone',
        'sandstone, bronze',
        'stainless steel',
        'stainless steel, bronze, copper',
        'stainless steel, concrete, aluminium',
        'steel',
        'steel, aluminium, lighting',
        'steel, glass, lighting',
        'steel, recycled highway barriers',
        'stone',
        'timber',
        'timber, metal',
        'wood',
        'wood, steel'
    ],
    'Design/Decorative Art'=>[
        'aluminium',
        'Aluminium and automative spray paint',
        'aluminium, brass, ceramic, copper',
        'aluminium, paint',
        'aluminium, synthetic polymer',
        'brass',
        'brass, organics',
        'bronze',
        'bronze and automotive paint',
        'bronze, native Ficus',
        'bronze, sandstone',
        'cast aluminium',
        'cement',
        'ceramic',
        'ceramic, cement',
        'concrete',
        'concrete, aluminium',
        'concrete, mosaic',
        'concrete, paint',
        'copper, bronze, stainless steel, lighting',
        'copper, glass',
        'epoxy resin, slate powder, fibregass and steel',
        'fibreglass',
        'found metals',
        'found metals, concrete',
        'found metals, granite',
        'granite',
        'lighting',
        'marble',
        'neon',
        'paint',
        'sandstone',
        'sandstone, bronze',
        'stainless steel',
        'stainless steel, bronze, copper',
        'stainless steel, concrete, aluminium',
        'steel',
        'steel, aluminium, lighting',
        'steel, glass, lighting',
        'steel, recycled highway barriers',
        'stone',
        'timber',
        'timber, metal',
        'wood',
        'wood, steel'
    ],
    'Drawing, Collage or other Work on Paper'=>[
        'Aluminium and automative spray paint',
        'aluminium, paint',
        'bronze and automotive paint',
        'concrete, paint',
        'paint',
        'copper, bronze, stainless steel, lighting',
        'lighting',
        'steel, aluminium, lighting',
        'steel, glass, lighting'
    ],
    'Mixed Media'=>[
        'aluminium, brass, ceramic, copper',
        'brass',
        'brass, organics',
        'copper, bronze, stainless steel, lighting',
        'lighting',
        'steel, aluminium, lighting',
        'steel, glass, lighting',
        'bronze, sandstone',
        'sandstone',
        'sandstone, bronze',
        'stone'
    ],
    'Other'=>[
        'aluminium',
        'Aluminium and automative spray paint',
        'aluminium, brass, ceramic, copper',
        'aluminium, paint',
        'aluminium, synthetic polymer',
        'brass',
        'brass, organics',
        'bronze',
        'bronze and automotive paint',
        'bronze, native Ficus',
        'bronze, sandstone',
        'cast aluminium',
        'cement',
        'ceramic',
        'ceramic, cement',
        'concrete',
        'concrete, aluminium',
        'concrete, mosaic',
        'concrete, paint',
        'copper, bronze, stainless steel, lighting',
        'copper, glass',
        'epoxy resin, slate powder, fibregass and steel',
        'fibreglass',
        'found metals',
        'found metals, concrete',
        'found metals, granite',
        'granite',
        'lighting',
        'marble',
        'neon',
        'paint',
        'sandstone',
        'sandstone, bronze',
        'stainless steel',
        'stainless steel, bronze, copper',
        'stainless steel, concrete, aluminium',
        'steel',
        'steel, aluminium, lighting',
        'steel, glass, lighting',
        'steel, recycled highway barriers',
        'stone',
        'timber',
        'timber, metal',
        'wood',
        'wood, steel'
    ],
    'Painting'=>[
        'Aluminium and automative spray paint',
        'aluminium, paint',
        'bronze and automotive paint',
        'concrete, paint',
        'paint'
    ],
    'Photography'=>[
        'copper, bronze, stainless steel, lighting',
        'lighting',
        'steel, aluminium, lighting',
        'steel, glass, lighting'
    ],
    'Posters'=>[
        'Aluminium and automative spray paint',
        'aluminium, paint',
        'bronze and automotive paint',
        'concrete, paint',
        'paint'
    ],
    'Print'=>[
        'Aluminium and automative spray paint',
        'aluminium, paint',
        'bronze and automotive paint',
        'concrete, paint',
        'paint'
    ],
    'Sculpture'=>[
        'aluminium',
        'Aluminium and automative spray paint',
        'aluminium, brass, ceramic, copper',
        'aluminium, paint',
        'aluminium, synthetic polymer',
        'cast aluminium',
        'concrete, aluminium',
        'stainless steel, concrete, aluminium',
        'steel, aluminium, lighting',
        'marble'
    ],
    'Textile Arts'=>[
        'bronze, sandstone',
        'sandstone',
        'sandstone, bronze',
        'stone'
    ]
];

$arttype_eventarttype_match = [
    'Architecture'=>[
        'Art, Creative, Culture, Exhibitions, Family events, Free',
        'Art, Creative, Culture, Exhibitions, Free',
        'Art, Creative, Culture, Free',
        'Art, Creative, Free',
        'Art, Exhibitions',
        'Art, Free',
        'Creative, Free, Music, Performing arts'
    ],

    'Books and Portfolios'=>[
        'Art, Creative, Culture, Exhibitions, Family events, Free',
        'Creative, Exhibitions, Family events, Free',
        'Culture, Family events, Featured, Festivals, Food, Music',
        'Culture, Family events, Free, Tours',
        'Family events',
        'Family events, Free, Green',
        'Art'
    ],
    'Design/Decorative Art'=>[
        'Art',
        'Art, Creative, Culture, Exhibitions, Family events, Free',
        'Art, Creative, Culture, Exhibitions, Free',
        'Art, Creative, Culture, Free',
        'Art, Creative, Free',
        'Art, Exhibitions',
        'Art, Free',
        'Business, Free, Workshops',
        'Creative, Culture, Exhibitions, Free, Tours',
        'Creative, Culture, Free, Tours',
        'Creative, Exhibitions, Family events, Free',
        'Creative, Free',
        'Creative, Free, Music, Performing arts',
        'Culture, Exhibitions, Free',
        'Culture, Family events, Featured, Festivals, Food, Music',
        'Culture, Family events, Free, Tours',
        'Culture, Free, Tours',
        'Exhibitions',
        'Exhibitions, Free',
        'Family events',
        'Family events, Free, Green',
        'Featured, Fitness &amp; well-being, Free',
        'Films, Free',
        'Fitness &amp; well-being'
    ],
    'Drawing, Collage or other Work on Paper'=>[
        'Art, Creative, Culture, Exhibitions, Family events, Free',
        'Creative, Exhibitions, Family events, Free',
        'Culture, Family events, Featured, Festivals, Food, Music',
        'Culture, Family events, Free, Tours',
        'Family events',
        'Family events, Free, Green'
    ],
    'Mixed Media'=>[
        'Creative, Culture, Exhibitions, Free, Tours',
        'Creative, Culture, Free, Tours',
        'Creative, Exhibitions, Family events, Free',
        'Creative, Free',
        'Creative, Free, Music, Performing arts',
        'Art'
    ],
    'Other'=>[
        'Business, Free, Workshops',
        'Creative, Culture, Exhibitions, Free, Tours',
        'Creative, Culture, Free, Tours',
        'Creative, Exhibitions, Family events, Free',
        'Creative, Free',
        'Creative, Free, Music, Performing arts',
        'Culture, Exhibitions, Free',
        'Culture, Family events, Featured, Festivals, Food, Music',
        'Culture, Family events, Free, Tours',
        'Culture, Free, Tours',
        'Exhibitions',
        'Exhibitions, Free',
        'Family events',
        'Family events, Free, Green',
        'Featured, Fitness &amp; well-being, Free',
        'Films, Free',
        'Fitness &amp; well-being'
    ],
    'Painting'=>[
        'Art, Creative, Culture, Exhibitions, Family events, Free',
        'Creative, Exhibitions, Family events, Free',
        'Culture, Family events, Featured, Festivals, Food, Music',
        'Culture, Family events, Free, Tours',
        'Family events',
        'Family events, Free, Green',
        'Art'
    ],
    'Photography'=>[
        'Films, Free',
        'Creative, Culture, Exhibitions, Free, Tours',
        'Creative, Culture, Free, Tours',
        'Creative, Exhibitions, Family events, Free',
        'Creative, Free',
        'Creative, Free, Music, Performing arts',
        'Art',
        'Creative, Culture, Exhibitions, Free, Tours',
        'Creative, Culture, Free, Tours',
        'Creative, Exhibitions, Family events, Free',
        'Creative, Free',
        'Creative, Free, Music, Performing arts'
    ],
    'Posters'=>[
        'Business, Free, Workshops',
        'Art, Creative, Culture, Exhibitions, Family events, Free',
        'Creative, Exhibitions, Family events, Free',
        'Culture, Family events, Featured, Festivals, Food, Music',
        'Culture, Family events, Free, Tours',
        'Family events',
        'Family events, Free, Green'
    ],
    'Print'=>[
        'Business, Free, Workshops',
        'Art, Creative, Culture, Exhibitions, Family events, Free',
        'Creative, Exhibitions, Family events, Free',
        'Culture, Family events, Featured, Festivals, Food, Music',
        'Culture, Family events, Free, Tours',
        'Family events',
        'Family events, Free, Green'
    ],
    'Sculpture'=>[
        'Art',
        'Creative, Culture, Exhibitions, Free, Tours',
        'Creative, Culture, Free, Tours',
        'Creative, Exhibitions, Family events, Free',
        'Creative, Free',
        'Creative, Free, Music, Performing arts'
    ],
    'Textile Arts'=>[
        'Art, Creative, Culture, Exhibitions, Family events, Free',
        'Art, Creative, Culture, Exhibitions, Free',
        'Art, Creative, Culture, Free',
        'Art, Creative, Free',
        'Art, Exhibitions',
        'Art, Free',
        'Creative, Free, Music, Performing arts',
        'Creative, Culture, Exhibitions, Free, Tours',
        'Creative, Culture, Free, Tours',
        'Creative, Exhibitions, Family events, Free',
        'Creative, Free',
        'Creative, Free, Music, Performing arts'
    ]
];

?>