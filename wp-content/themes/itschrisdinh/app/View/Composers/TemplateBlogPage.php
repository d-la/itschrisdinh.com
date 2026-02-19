<?php
namespace App\View\Composers;

use Roots\Acorn\View\Composer;

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
            'pageTitle' => $this->pageTitle()
        ];
    }

    public function pageTitle() {
        return get_the_title();
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
