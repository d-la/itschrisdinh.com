<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class SingleBlog extends Composer
{
    protected static $views = [
        'single-blog',
    ];

    /**
     * Retrieve the post title.
     */
    public function title(): string {
        return get_the_title();
    }

    private function getPostData() {
        return get_queried_object();
    }

    private function getThumbnailData() {
        $post = $this->getPostData();

        return [
            'url' => get_the_post_thumbnail_url() ?: null,
            'alt' => get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true )
        ];
    }

    private function getPostTerms() {
        $post = $this->getPostData();

        if ($post->ID) {
            $terms = wp_get_post_terms($post->ID, 'blog-collection', [
                'fields' => 'ids'
            ]);

            return $terms;
        }

        return null;
    }

    private function getRelatedPosts() {
        $post = $this->getPostData();
        $terms = $this->getPostTerms();

        if (empty($post)) {
            return false;
        }

        if (empty($terms)) {
            return false;
        }

        $args = [
            'post_type' => $post->post_type,
            'status' => 'publish',
            'posts_per_page' => 3,
            'post__not_in' => [$post->ID],
            'orderby' => 'rand',
            'tax_query' => [
                [
                    'taxonomy' => 'blog-collection',
                    'field' => 'term_id',
                    'terms' => $terms
                ]
            ]
        ];

        $query = new WP_Query($args);

        return $query->posts;
    }

    public function with()
    {
        return [
            'title' => get_the_title(),
            'content' => get_the_content(),
            'relatedPosts' => $this->getRelatedPosts(),
            'thumbnailData' => $this->getThumbnailData(),
            'post' => $this->getPostData(),
            'terms' => $this->getPostTerms()
        ];
    }
}
