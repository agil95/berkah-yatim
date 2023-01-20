import copyToClipboard from '../utils/copyToClipboard';
import Toaster from './toaster';

class BySharer {
  constructor() {
    this.shareItems = document.querySelectorAll('.by-bottomsheet-share-item');
    this.toaster = new Toaster('Link berhasil tersalin');

    this.setListenerShareItem();
  };

  share(target, url, prokerName) {
    let shareUrl;
    switch(target) {
      case 'whatsapp':
        shareUrl = `https://api.whatsapp.com/send?text=${prokerName}. Untuk info lebih lanjut, klik ${url}`;
        window.open(shareUrl);
        break;
      case 'fb':
        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${prokerName}`;
        window.open(shareUrl);
        break;
      default:
        copyToClipboard(url);
        this.toaster.show();
    }
  }

  setListenerShareItem() {
    Array.prototype.forEach.call(this.shareItems, (item) => {
      item.addEventListener('click', () => {
        const target = item.getAttribute('data-target');
        const url = window.location.href;
        const prokerName = item.parentNode.getAttribute('data-proker-name');

        this.share(target, url, prokerName);
      });
    });
  };
}

export default BySharer;
