<?php
get_header();

while (have_posts()) : the_post();

    $showPrice = get_field('show_price');
    $price = get_field('price');

    // Your single service content here
    the_title('<h1>', '</h1>');
    the_content();

    if(has_post_thumbnail()){
        the_post_thumbnail('medium', ['style' => 'width: 100px; height: auto;']); // Affiche l'image à la une
    }

    if(!empty($price) && !empty($showPrice) && $showPrice ){
        echo '<div class="price">Prix : ' . $price . '€</div>';
    }

endwhile;

get_footer();