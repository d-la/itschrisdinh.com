class ImageGalleryLightbox extends HTMLElement {
  constructor() {
    super();

    // Internal state variables
    this.galleryItems = [];
    this.currentImageIndex = 0;
    this.nextImageIndex = 0;
    this.prevImageIndex = 0;
    this.imageGalleryLightbox = this;
    this.overlayClose = this.querySelector('.overlay__close');
  }

  connectedCallback() {
    this.handleImageSelected();
    this.setNextAndPrevButtonListeners();
  }

  disconnectedCallback() {
  }

  handleImageSelected() {
    document.addEventListener('image-gallery:imageSelected', (e) => {
      const clickedGalleryImage = e?.detail?.image;

      // Anytime a user clicks on an image in our image gallery, get only the images that are visible (in case they've filtered the images beforehand)
      // so we can determine which image to show and which images should be shown after/before based on the filtered images (if any)
      this.galleryItems = Array.from(document.querySelectorAll('.image-gallery__item')).filter((item) => {
        return item.style.display !== 'none';
      }).map(item => {
        const image = item.querySelector('img');

        return {
          hidden: item.style.display === 'none',
          index: parseInt(image?.dataset?.index),
          width: parseInt(image?.dataset?.width),
          height: parseInt(image?.dataset?.height),
          src: image?.src,
        }
      });

      this.currentImageIndex = parseInt(clickedGalleryImage.dataset.index);

      // Set the size of the image container based on the index of the clicked image and then show the image
      this.setGalleryLightboxSizeAndShowImage(this.currentImageIndex);

      // Set the next/previous image indexes in our state
      this.setNextAndPrevGalleryImageIndex(this.currentImageIndex);

      // Show the overlay
      this.imageGalleryLightbox.classList.add('overlay--active');
    });

    // Handle closing the overlay when the overlay is clicked
    this.imageGalleryLightbox.addEventListener('click', (e) => {
      if (e.target.classList.contains('overlay')) {
        this.imageGalleryLightbox.classList.remove('overlay--active');
      }
    });

    // Handle closing the overlay when the close button is clicked
    if (this.overlayClose) {
      this.overlayClose.addEventListener('click', () => {
        this.imageGalleryLightbox.classList.remove('overlay--active');
      });
    }
  }

  setGalleryLightboxSizeAndShowImage(imageDataIndex) {
    const imageContainer = this.imageGalleryLightbox.querySelector('.image-container');
    const image = this.imageGalleryLightbox.querySelector('.overlay__image');
    const imageDescription = this.imageGalleryLightbox.querySelector('.overlay__image-description');

    const imageHasSrc = image.src !== '';

    // If the image has a src, we need to fade out the image description and remove the image
    if (imageHasSrc) {
      imageDescription.classList.remove('fade-in');
      imageDescription.classList.add('opacity-0');
      image.src = '';
    }

    // Uses the array of all images that are currently shown + the clicked image
    const imageData = this.galleryItems.find(item => item.index === imageDataIndex);

    const maxWidth = window.innerWidth;
    const maxHeight = window.innerHeight;

    if (imageData) {
      const { width, height } = this.calculateImageAspectRatio(imageData.width, imageData.height, maxWidth, maxHeight);

      imageContainer.style.width = `${width}px`;
      imageContainer.style.height = `${height}px`;
      imageContainer.classList.add('overlay__image-load'); // Add the "loading" animation

      setTimeout(() => {
        imageContainer.classList.remove('overlay__image-load'); // Remove the "loading" animation

        // Fade in the image description
        imageDescription.classList.remove('fade-out');
        imageDescription.classList.add('fade-in');

        // Load in the image
        image.src = imageData.src;
      }, 1000);
    }
  }

  setNextAndPrevGalleryImageIndex(currentImageIndex) {
    // The index in the array of the current image we want to find the next/prev indexes for
    const currentImageDataIndex = this.galleryItems.findIndex(item => item.index === currentImageIndex);

    const totalIndexes = this.galleryItems.length;

    let nextIndex = -1;
    let prevIndex = -1;

    // If the current image is the last image in the gallery (filtered or not), we need to set the next index to the first image in the gallery
    // Otherwise, we set the next index to the next image in the gallery
    if ((currentImageDataIndex + 1) >= totalIndexes) {
      nextIndex = this.galleryItems[0].index;
    } else {
      nextIndex = this.galleryItems[currentImageDataIndex + 1].index;
    }

    // If the current image is the first image in the gallery (filtered or not), we need to set the previous index to the last image in the gallery
    // Otherwise, we set the previous index to the previous image in the gallery
    if ((currentImageDataIndex - 1) < 0) {
      prevIndex = this.galleryItems[totalIndexes - 1].index;
    } else {
      prevIndex = this.galleryItems[currentImageDataIndex - 1].index;
    }

    this.nextImageIndex = nextIndex;
    this.prevImageIndex = prevIndex;
  }

  setNextAndPrevButtonListeners() {
    const nextOrPrevButton = this.imageGalleryLightbox.querySelectorAll('.overlay__navigate');

    nextOrPrevButton.forEach((button) => {
      button.addEventListener('click', (e) => {
        e.preventDefault();

        if (button.classList.contains('overlay__next')) {

          // Set the next image in the gallery and then the next/prev indexes
          this.setGalleryLightboxSizeAndShowImage(this.nextImageIndex);
          this.setNextAndPrevGalleryImageIndex(this.nextImageIndex);
          this.currentImageIndex = this.nextImageIndex;
        } else if (button.classList.contains('overlay__prev')) {

          // Set the prev image in the gallery and then the next/prev indexes
          this.setGalleryLightboxSizeAndShowImage(this.prevImageIndex);
          this.setNextAndPrevGalleryImageIndex(this.prevImageIndex);
          this.currentImageIndex = this.prevImageIndex;
        }
      });
    });
  }

  /**
   * Calculate the aspect ratio of the image based on the browser size and the images aspect ratio
   *
   * @param {String} width - The width of the image
   * @param {String} height - The height of the image
   * @param {Number} maxWidth - The max width of the browser
   * @param {Number} maxHeight - The max height of the browser
   *
   * @returns {Object} - The width and height of the image based on the browser size and the images aspect ratio
   */
  calculateImageAspectRatio = (width, height, maxWidth, maxHeight) => {
    const imageWidth = parseInt(width);
    const imageHeight = parseInt(height);

    let maxWidthGutter = 0;
    let maxHeightGutter = 0;

    // Based on screen size, reduce the max width to allow for space between the browser window and the image
    if (maxWidth < 500) {
      maxWidthGutter = 40;
      maxHeightGutter = 200;
    } else if (maxWidth < 1024) {
      maxWidthGutter = 200;
      maxHeightGutter = 200;
    } else {
      maxWidthGutter = 200;
      maxHeightGutter = 200;
    }

    const ratio = Math.min((maxWidth - maxWidthGutter) / imageWidth, (maxHeight - maxHeightGutter) / imageHeight);

    return {
      width: imageWidth * ratio,
      height: imageHeight * ratio,
    };
  }
}

customElements.define('image-gallery-lightbox', ImageGalleryLightbox);
