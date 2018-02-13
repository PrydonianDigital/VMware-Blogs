<?php get_header(); ?>

<?php get_template_part( 'parts/home/home', 'carousel' ); ?>

<?php get_template_part( 'parts/home/featured', 'posts' ); ?>

<?php get_template_part( 'parts/global/search', 'form' ); ?>

<?php get_template_part( 'parts/home/explore', 'topics' ); ?>

<?php get_template_part( 'parts/home/trending', 'posts' ); ?>

<?php get_template_part( 'parts/home/latest', 'posts' ); ?>

<?php get_footer(); ?>