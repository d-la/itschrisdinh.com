const handleNavigationMenuToggle = (menuToggleButtonID = 'menu-toggle-button', menuOverlayId = 'menu-overlay') => {
  const menuToggleButton = document.getElementById(menuToggleButtonID);
  const menuOverlay = document.getElementById(menuOverlayId);

  if (!menuOverlay || !menuToggleButton) {
    console.error('Neither menu toggle button or menu overlay found - unable to open navigation menu');
    return;
  }

  // Event listener for menuToggleButton click to toggle menu overlay
  menuToggleButton.addEventListener('click', (e) => {
    const isVisible = menuOverlay.classList.contains('active');
    toggleMenuVisibility(menuOverlay, isVisible);

    e.preventDefault();
  });
}

const toggleMenuVisibility = (overlay, isVisible) => {
  if (isVisible) {
    overlay.classList.remove('active');
    document.body.classList.remove('menu-overlay-active');

    overlay.addEventListener(
      'transitionend',
      () => {
        overlay.classList.add('pointer-events-none');
      },
      { once: true }
    );
  } else {
    overlay.classList.remove('pointer-events-none');

    requestAnimationFrame(() => {
      overlay.classList.add('active');
    });
    document.body.classList.add('menu-overlay-active');
  }
}


export default handleNavigationMenuToggle;
