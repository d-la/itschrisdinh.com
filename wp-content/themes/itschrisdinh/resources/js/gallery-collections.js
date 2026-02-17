import mixitup from 'mixitup';

class GalleryCollections extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    this.filterGalleryItems();
    this.setActiveClass();
  }

  disconnectedCallback() {
  }

  filterGalleryItems() {
    const gallery = document.querySelector('#gallery');

    if (!gallery) {
      console.error('Unable to find gallery container - unable to filter gallery items');
      return;
    }

    const mixer = mixitup(gallery, {
      animation: {
        duration: 300
      }
    });
  }

  setActiveClass() {
    const collectionsOptions = this.querySelectorAll('.gallery-collections__collection');

    if (!collectionsOptions.length) {
      console.warn('No collection options found - setActiveClass() will not run');
      return;
    }

    collectionsOptions.forEach((option) => {
      option.addEventListener('click', (e) => {
        const currentOption = this.querySelector('.gallery-collections__collection--active');
        if (currentOption) {
          currentOption.classList.remove('gallery-collections__collection--active');
        }

        e.target.classList.add('gallery-collections__collection--active');
      });
    });
  }
}

customElements.define('gallery-collections', GalleryCollections);
