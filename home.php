<?php get_header(); ?>

<?php
    // Utilisation d'une boucle standard pour afficher les articles
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            // Récupérer le titre, l'extrait, la date de publication
            ?>
            <a href="<?php echo get_permalink(); ?>">
                <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('post-thumbnail', [
                            'style' => "max-width: 400px;"
                        ]);
                    }
                ?>

                <h4><?php echo get_the_title(); ?></h4>
                <div>
                    <span>Auteur : <?php the_author() ?></span>
                    <span style="display: block;">Date de publication : <?php the_date() ?></span>
                    <span><?php displayReadingTime(); ?></span>
                </div>
            </a>
            <?php
        }
    } else {
    // Aucun article trouvé
    }
?>

<?php
get_footer();

