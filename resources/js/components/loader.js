class Loader {
  constructor() {
    this.loader = document.getElementById('loading');
  }

  show() {
    if (this.loader) {
      this.loader.style.display = 'block';
    }
  }

  hide() {
    if (this.loader) {
      this.loader.style.display = 'none';
    }
  }
}

export default Loader;
