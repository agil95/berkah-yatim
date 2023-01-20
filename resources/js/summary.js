import Modal from './components/modal';
import Toaster from './components/toaster';
import copyToClipboard from './utils/copyToClipboard';

(function(){
  /**
   * VARIABLES
   */
  const summaryModal = new Modal();
  const summaryToaster = new Toaster()

  /**
   * METHODS
   */
  function init() {
    summaryModal.showModal(true);
  }

  /**
   * INITIALIZATIONS
   */
  init();
})();
