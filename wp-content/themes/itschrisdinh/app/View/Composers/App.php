<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'menuItems' => $this->menuItems(),
            'phoneNumber' => $this->getPhoneNumber(),
            'instagramLink' => $this->getInstagramLink(),
            'emailAddress' => $this->getEmailAddress(),
            'footerClasses' => $this->getFooterClasses(),
            'contactInformation' => $this->getContactInformation()
        ];
    }

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    private function menuItems()
    {
        if (function_exists('has_nav_menu') && function_exists('wp_get_nav_menu_items') && has_nav_menu('primary_navigation')) {
            return wp_get_nav_menu_items('primary-menu');
        }

        return false;
    }

    /**
     * Fetch the 'contact_information' group from ACF options.
     *
     * @return array|null
     */
    private function getContactInformation()
    {
        return get_field('contact_information', 'option');
    }

    /**
     * Fetch phone number from contact information.
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        $contactInformation = $this->getContactInformation();
        return $contactInformation['phone_number'] ?? null;
    }

    /**
     * Fetch Instagram link from contact information.
     *
     * @return string|null
     */
    public function getInstagramLink()
    {
        $contactInformation = $this->getContactInformation();
        return $contactInformation['instgram']['url'] ?? null;
    }

    /**
     * Fetch email address from contact information.
     *
     * @return string|null
     */
    public function getEmailAddress()
    {
        $contactInformation = $this->getContactInformation();
        return $contactInformation['email'] ?? null;
    }

    /**
     * Determine the footer's CSS classes.
     *
     * @return string
     */
    private function getFooterClasses()
    {
        return is_front_page() ? 'absolute bottom-0 w-full' : 'relative';
    }
}
