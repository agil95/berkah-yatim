class Modal {
  constructor() {
    this.overlay = document.querySelector('.by-overlay');
    this.modal = document.querySelector('.by-modal');
    this.btnClose = document.querySelectorAll('.by-modal__btn-close');

    this.setListenerCloseButton();
  };
  
  showModal(show = false) {
    if (show) {
      this.modal.classList.add('active');
      this.overlay.classList.add('active');
      document.body.style.overflowY = 'hidden';
    } else {
      this.modal.classList.remove('active');
      this.overlay.classList.remove('active');
      document.body.style.overflowY = '';
    }
  };
  
  setListenerElement(elems) {
    if (elems.length) {
      Array.prototype.forEach.call(elems, elem => {
        elem.addEventListener('click', () => {
          this.showModal(true);
        });
      });

      return;
    }

    elems.addEventListener('click', () => {
      this.showModal(true);
    });
  };

  setListenerCloseButton() {
    if (this.btnClose && this.btnClose.length) {
      Array.prototype.forEach.call(this.btnClose, elem => {
        elem.addEventListener('click', () => {
          this.showModal(false);
        });
      });
    }
  };
}

export default Modal;
