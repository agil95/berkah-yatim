class Toaster {
  constructor(text) {
    this.toaster = document.querySelector('.by-toaster');
    this.setText(text);
  }

  setText(text) {
    this.toaster.textContent = text;
  }

  show() {
    this.toaster.classList.add('active');
    
    setTimeout(() => { 
      this.toaster.classList.remove('active');
    }, 3000);
  }
}

export default Toaster;
