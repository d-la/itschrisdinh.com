
import globalConstants from "./global-constants";

// Scroll in animation logic
const onIntersection = (elements, observer) => {
  elements.forEach((element, index) => {
    if (element.isIntersecting) {
      const elementTarget = element.target;
      if (elementTarget.classList.contains(globalConstants.SCROLL_OFFSCREEN_CLASS)) {
        elementTarget.classList.remove(globalConstants.SCROLL_OFFSCREEN_CLASS);
        if (elementTarget.hasAttribute('data-cascade'))
          elementTarget.setAttribute('style', `--animation-order: ${index};`);
      }
      observer.unobserve(elementTarget);
    } else {
      element.target.classList.add(globalConstants.SCROLL_OFFSCREEN_CLASS);
      element.target.classList.remove(globalConstants.SCROLL_CANCEL_CLASS);
    }
  });
}

const initializeScrollAnimationTrigger = (rootEl = document) => {
  const animationTriggerElements = Array.from(
    rootEl.getElementsByClassName(globalConstants.SCROLL_TRIGGER_CLASS)
  );
  if (animationTriggerElements.length === 0) return;

  const observer = new IntersectionObserver(onIntersection, {
    rootMargin: '0px 0px -50px 0px',
  });

  animationTriggerElements.forEach((element) => observer.observe(element));
};

export default initializeScrollAnimationTrigger;
