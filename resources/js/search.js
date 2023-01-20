import { debounce } from 'lodash';
import Loader from './components/loader';

(function(){
  /**
   * VARIABLES
   */
  const app = {
    url: document.getElementById('api-url'),
    token: document.getElementById('api-token'),
    searchBar: document.getElementById('by-search-bar'),
    searchEmpty: document.querySelector('.search-empty'),
    searchHistory: document.getElementById('search-history'),
    searchResult: document.getElementById('search-result'),
    searchTemplate: document.getElementById('search-card-template'),
  };
  const apiUrlBase = app.url.value || '/api/search';
  const loader = new Loader();

  /**
   * METHODS
   */
  app.init = function() {
    const results = JSON.parse(localStorage.getItem('searchHistory')) || [];

    app.prokerLink = app.searchResult.getAttribute('data-proker-url');
    app.prokerAsset = app.searchResult.getAttribute('data-asset');

    app.showResult(results, app.searchHistory);
    app.showResult([], app.searchResult);
  };

  /**
   * Search function from given keyword
   * @param keyword - query to search
   */
  app.search = debounce(function(keyword) {
    const apiUrl = `${apiUrlBase}?search=${keyword}`;

    if (keyword.length < 2) {
      return; // immediately return for less keyword
    }

    loader.show();
    
    fetch(apiUrl, {
      headers: {
        token: app.token.value,
      },
    })
      .then(response => response.json())
      .then(data => {
        const results = data.search_results || [];

        if (results.length > 0) {
          localStorage.setItem('searchHistory', JSON.stringify(results));
        }
        app.showResult(results, app.searchResult);
      })
      .catch(err => console.error(`[API Error]: ${err.message}`))
      .finally(() => loader.hide());
  }, 250);

  /**
   * Clear current search result card
   */
  app.clearResult = function(searchListElem) {
    while (searchListElem.firstChild) {
      searchListElem.removeChild(searchListElem.firstChild);
    }
  };

  /**
   * Render show result card
   * @param data - list of proker
   */
  app.showResult = function (data = [], elem) {
    const searchList = elem.querySelector('.search-list');
    
    app.clearResult(searchList);

    if (data.length === 0) {
      elem.classList.add('hide');
      if (app.searchBar.value === '') {
        return;
      }
      app.searchEmpty.classList.add('show');
      return;
    }

    // show result data
    data.forEach(result => {
      const searchCard = app.createSearchCard(result.url, result.dokumentasi, result.nama_kegiatan);
      searchList.appendChild(searchCard);
    });

    elem.classList.remove('hide');
    app.searchEmpty.classList.remove('show');
  };

  /**
   * Create new search card and bind data into it
   * @param link - url of proker campaign
   * @param img - image url
   * @param title - title of the campaign
   */
  app.createSearchCard = function(link, img, title) {
    const newCard = app.searchTemplate.cloneNode(true);
    const prokerUrl = `${app.prokerLink}/${link}`;
    const prokerImg = `${app.prokerAsset}/${img}`;
    newCard.setAttribute('href', prokerUrl);
    newCard.querySelector('img').setAttribute('src', prokerImg);
    newCard.querySelector('img').setAttribute('alt', title);
    newCard.querySelector('p').textContent = title;
    newCard.removeAttribute('hidden');
    return newCard;
  };

  /**
   * EVENT LISTENERS
   */
  app.searchBar.addEventListener('keyup', () => {
    app.search(app.searchBar.value);
  });

  /**
   * INITIALIZATIONS
   */
  app.init();
})();
