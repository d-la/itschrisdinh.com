import { Splide } from '@splidejs/splide';

class Slider extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    this.initiateSplideSlider();
  }

  disconnectedCallback() {
  }

  initiateSplideSlider = ( selector = '.splide' ) => {
    const sliders = document.querySelectorAll(`${selector}`);

    // The gallery will have a thumbnail slider that needs to be syncd. do not call this by default on that page
    if ( sliders.length > 0 && !document.body.classList.contains('gallery') ) {
      sliders.forEach( slider => {
        let sliderSettingsJSON = slider.dataset.splide ? JSON.parse(slider.dataset.splide) : {};
        sliderSettingsJSON = this.handleMergingCustomSettings(slider, sliderSettingsJSON);
        const sliderId = slider.id;

        if ( sliderId && Object.keys(sliderSettingsJSON).length > 0 ) {
          const splide = new Splide(`#${sliderId}`, sliderSettingsJSON).mount();

          if (slider.dataset.customPagination === 'true') {
            this.applyCustomPagination(slider, splide);
          }
        }
      });
    }
  }

  handleMergingCustomSettings = (slider, sliderSettingsJSON) => {
    const mobileCustomSettings = slider.dataset.mobileCustomSettings ? JSON.parse(slider.dataset.mobileCustomSettings) : {};
    const tabletCustomSettings = slider.dataset.tabletCustomSettings ? JSON.parse(slider.dataset.tabletCustomSettings) : {};
    const desktopCustomSettings = slider.dataset.desktopCustomSettings ? JSON.parse(slider.dataset.desktopCustomSettings) : {};

    if ( Object.keys(mobileCustomSettings).length > 0 ) {
      sliderSettingsJSON.breakpoints['768'] = {...sliderSettingsJSON.breakpoints['768'], ...mobileCustomSettings};
    }

    if ( Object.keys(tabletCustomSettings).length > 0 ) {
      sliderSettingsJSON.breakpoints['1120'] = {...sliderSettingsJSON.breakpoints['1120'], ...tabletCustomSettings};
    }

    if ( Object.keys(desktopCustomSettings).length > 0 ) {
      sliderSettingsJSON = {...sliderSettingsJSON, ...desktopCustomSettings};
    }

    return sliderSettingsJSON;
  }

  applyCustomPagination = (slider, splide) => {
    const pagination = slider.querySelector('.splide__custom-pagination');

    const updatePagination = () => {
      const activeIndex = splide.index;
      const totalSlides = splide.length;
      const paginationText = `${activeIndex + 1} - ${totalSlides}`;
      pagination.innerHTML = paginationText;
    };

    updatePagination();
    splide.on('moved', updatePagination);
  }
}

customElements.define('splide-slider', Slider);
