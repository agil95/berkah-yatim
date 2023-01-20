import { throttle } from 'lodash';
import Bottomsheet from './components/bottomsheet';
import Sharer from './components/sharer';

(function(){
  /**
   * VARIABLES
   */
  const proker = {
    btnStory: document.querySelector('.story-btn-expand'),
    btnShare: document.querySelector('.btn-proker-share'),
    story: document.querySelector('.story'),
    sectionStory: document.getElementById('proker-story'),
    sectionCta: document.querySelector('.section-cta'),
  };
  const MAX_HEIGHT_STORY = 236;
  const bottomsheet = new Bottomsheet();

  /**
   * METHODS
   */
  proker.init = function init() {
    if (proker.story.offsetHeight < MAX_HEIGHT_STORY) {
      proker.story.classList.add('expanded');
      proker.btnStory.remove();
    }

    // init sharer component
    new Sharer();

    // init bottomsheet listener element
    bottomsheet.setListenerElement(proker.btnShare);
  };
  proker.toggleStory = function() {
    if (proker.story.classList.contains('expanded')) {
      proker.story.classList.remove('expanded');
      proker.btnStory.firstChild.textContent = 'Baca selengkapnya';
    } else {
      proker.story.classList.add('expanded');
      proker.btnStory.firstChild.textContent = 'Baca lebih ringkas';
    }
  };
  proker.showStickyButton = throttle(function() {
    if (
      window.pageYOffset + window.innerHeight > 
      proker.sectionStory.offsetTop + proker.sectionStory.offsetHeight
    ) {
      proker.sectionCta.classList.add('active');
    } else {
      proker.sectionCta.classList.remove('active');
    }
  }, 250);

  /**
   * EVENT LISTENERS
   */
  proker.btnStory.addEventListener('click', function() {
    proker.toggleStory();
  });

  window.addEventListener('scroll', () => {
    // console.log(window.innerHeight, proker.sectionStory.offsetTop + proker.sectionStory.offsetHeight);
    proker.showStickyButton();
  });
  
  /**
   * INITIALIZATIONS
   */
  proker.init();
})();
