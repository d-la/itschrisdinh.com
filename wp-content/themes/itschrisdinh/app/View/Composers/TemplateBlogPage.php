<?php
namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class TemplateBlogPage extends Composer {
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-blog-page',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with() {
        return [
            'siteName' => $this->siteName(),
            'pageTitle' => $this->pageTitle(),
            'featuredPosts' => $this->getFeaturedPosts(),
            'featuredSliderSettings' => $this->getFeaturedSliderSettings(),
            'otherCollectionPosts' => $this->getOtherCollectionPosts()
        ];
    }

    public function pageTitle() {
        return get_the_title();
    }

    private function getFeaturedTerm() {
        return get_field('featured_blog');
    }

    private function getFeaturedSliderSettings() {
        return get_field('featured_slider_settings');
    }

    private function getFeaturedPosts() {
        $termId = $this->getFeaturedTerm();

        if (empty($termId)) {
            return false;
        }

        $args = [
            'post_type' => 'blog',
            'status' => 'publish',
            'posts_per_page' => 10,
            'orderby' => 'rand',
            'tax_query' => [
                [
                    'taxonomy' => 'blog-collection',
                    'field' => 'term_id',
                    'terms' => [$termId]
                ]
            ]
        ];

        $query = new WP_Query($args);

        return $query->posts;
    }

    private function getOtherCollectionTerms() {
        return get_field('other_blog_collections');
    }

    private function getOtherCollectionPosts() {
        $terms = $this->getOtherCollectionTerms();

        if (empty($terms)) {
            return false;
        }

        $sections = [];

        foreach ($terms as $termData) {
            $query = new \WP_Query([
                'post_type'      => 'blog',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'tax_query'      => [
                    [
                        'taxonomy' => 'blog-collection',
                        'field'    => 'term_id',
                        'terms'    => [$termData->term_id],
                    ]
                ],
            ]);

            $posts = $query->posts;

            foreach ($posts as $post) {
                if (!empty($post)) {
                    $post->collection_name = $termData->name;
                }
            }

            $sections[$termData->name] = $posts;
        }

        return $sections;
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName() {
        return get_bloginfo('name', 'display');
    }
}
