class Bottomsheet {
  constructor() {
    this.overlay = document.querySelector('.by-overlay');
    this.bottomsheet = document.querySelector('.by-bottomsheet');
    this.btnClose = document.querySelectorAll('.by-bottomsheet__btn-close');

    this.setListenerCloseButton();
  };

  showOverlay(show = false) {
		if (show) {
      this.overlay.classList.add('active');
      document.body.style.overflowY = 'hidden';
		} else {
      this.overlay.classList.remove('active');
      document.body.style.overflowY = '';
		}
  };
  
  showBottomsheet(show = false) {
    if (show) {
      this.bottomsheet.classList.add('active');
    } else {
      this.bottomsheet.classList.remove('active');
    }
  };
  
  setListenerElement(elems) {
    if (elems.length) {
      Array.prototype.forEach.call(elems, elem => {
        elem.addEventListener('click', () => {
          this.showOverlay(true);
          this.showBottomsheet(true);
        });
      });

      return;
    }

    elems.addEventListener('click', () => {
      this.showOverlay(true);
      this.showBottomsheet(true);
    });
  };

  setListenerCloseButton() {
    if (this.btnClose && this.btnClose.length) {
      Array.prototype.forEach.call(this.btnClose, elem => {
        elem.addEventListener('click', () => {
          this.showOverlay(false);
          this.showBottomsheet(false);
        });
      });
    }
  };
}

export default Bottomsheet;
