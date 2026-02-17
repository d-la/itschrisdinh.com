<?php
namespace App\View\Components;

use Roots\Acorn\View\Component;

class ImageGallery extends Component {
    public $galleryItems = [];
    public $loadMoreType = null;
    public $morePostsAvailable = false;
    public $maximumAmountOfImages = 0;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct() {
        $this->galleryItems = $this->getGalleryItems();
        $this->loadMoreType = $this->getLoadMoreType();
        $this->maximumAmountOfImages = (int) $this->getMaximumAmountOfImages();
    }

    private function getGalleryItems() {
        $allItems = get_field('gallery_images');

        $maximumAmountOfImages = $this->getMaximumAmountOfImages();

        if (($maximumAmountOfImages !== 0) && count($allItems) > (int) $maximumAmountOfImages) {
            $this->morePostsAvailable = true;
        }

        $items = [];

        if ( is_array($allItems) && !empty($allItems) ) {
            foreach ($allItems as $key => $item) {
                // Only display the amount of images set from the admin field
                if ((int)$maximumAmountOfImages !== 0  && (($key + 1) > (int) $maximumAmountOfImages)) {
                    break;
                }

                $terms = get_the_terms($item['ID'], 'collection');

                // Set every item's filter to include all
                $item['filters'] = 'all';

                // If we have any collections set, add them to our new items array
                if ( is_array($terms) && !empty($terms) && !is_wp_error($terms) ) {
                    $allTerms = array_column($terms, 'slug');
                    $allTermsTitle = array_column($terms, 'name');

                    if ( !empty($allTerms) ) {
                        $item['taxonomy_terms'] = implode(',', $allTerms);
                    } else {
                        $item['taxonomy_terms'] = '';
                    }

                    if ( !empty($allTermsTitle) ) {
                        $item['taxonomy_terms_name'] = implode(',', $allTermsTitle);
                    } else {
                        $item['taxonomy_terms_name'] = '';
                    }

                    $item['filters'] = !empty($item['taxonomy_terms']) ? 'all ' . $item['taxonomy_terms'] : 'all';
                }

                array_push($items, $item);
            }
        }

        return $items;
    }

    private function getMaximumAmountOfImages() {
        return get_field('maximum_images');
    }

    private function getLoadMoreType() {
        return get_field('load_more_type');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.image-gallery');
    }
}
