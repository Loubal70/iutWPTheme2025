<?php /* Template Name: Services */ ?>
<?php
$services_query = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => -1, // Afficher tous les services
    'orderby' => 'title', // Trier les services par titre
    'order' => 'ASC', // Dans l'ordre croissant,

    // meta_query est utilisé pour filtrer des données "simples" liées au post
    // tax_query est utilisé également pour filter mais avec des données de liaisons
    // comme des terms (catégories, types...)

    // Filtrer avec un champ ACF --> meta_query
    // Filtrer avec une taxonomie --> tax_query (cf front-page.php)
    'meta_query' => [
        [
            'key' => 'show_price', // Le nom du champ personnalisé ACF
            'value' => '1', // ACF stocke true comme '1'
            'compare' => '='
        ]
    ]
));
if ($services_query->have_posts()) :
    while ($services_query->have_posts()) : $services_query->the_post();
        the_title(); // Affiche le titre
        the_content(); // Affiche le contenu (ici la description)
//        the_excerpt(); // Affiche l'extrait
        if(has_post_thumbnail()){
            the_post_thumbnail('medium', ['style' => 'width: 100px; height: auto;']); // Affiche l'image à la une
        }
        echo '<a href="' . get_permalink() . '">Lien vers l\'article</a>'; // Lien vers l'article
    endwhile;
    wp_reset_postdata(); // Réinitialiser la requête
else :
    echo 'Aucun service trouvé';
endif;