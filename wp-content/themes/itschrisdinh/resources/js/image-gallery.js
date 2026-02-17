class ImageGallery extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    this.handleGalleryImageClick();
  }

  disconnectedCallback() {
  }

  handleGalleryImageClick() {
    this.addEventListener('click', (e) => {
      let image = null;

      if (e.target.localName === 'img') {
        image = e.target;
      } else if (e.target.localName === 'button') {
        image = e.target.querySelector('img') ?? null;
      }

      if (image) {
        this.dispatchEvent(
          new CustomEvent('image-gallery:imageSelected', {
            detail: {
              image
            },
            bubbles: true,
            composed: true
          })
        );
      }
    });
  }
}

customElements.define('image-gallery', ImageGallery);
