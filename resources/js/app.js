import setInputFilter from './utils/setFilterInput';
import thousandSeparator from './utils/thousandSeparator';

(function(){
	/**
	 * VARIABLES
	 */
	const TAB_LINK_CLASS = '.tab-item__link[data-toggle=tab]';
	const TAB_PANE_CLASS = '.tab-pane';
	const NAV_BACK_CLASS = 'div.by-nav__back';
	const IO_OPTIONS = {
		threshold: 0.1,
	};
	const app = {
		accordion: document.querySelectorAll('.by-accordion'),
		bottomsheet: document.querySelector('.by-bottomsheet'),
		btnBack: document.querySelector(NAV_BACK_CLASS),
		iconShowPass: document.querySelectorAll('.input-password__icon'),
		inputNumbers: document.querySelectorAll('input[data-filter=number]'),
		overlay: document.querySelector('.by-overlay'),
		donationList: document.querySelector('[data-donation-scroll=true]'),
		donationLoading: document.querySelector('.donation-item-loading'),
		isLoading: false,
		isIntersecting: false,
	};
	const observer = new IntersectionObserver(entries => {
		const [{ isIntersecting }] = entries;

		if (isIntersecting) {
			app.isIntersecting = true;
			app.fetchingInterval = setInterval(() => {
				if (app.isIntersecting && !app.isLoading) {
					fetchNewDonation();
				}
			}, 1000);
			fetchNewDonation();
		} else {
			app.isIntersecting = false;
			clearInterval(app.fetchingInterval);
		}
	}, IO_OPTIONS);
	
	
	/**
	 * METHODS
	 */
	app.init = function() {
		// initialize slider
		$('.slider-banner').slick({
			arrows: false,
			centerMode: true,
			centerPadding: '12px',
			slidesToShow: 1,
			dots: true,
			autoplay: true,
		});
	};
	
	async function fetchNewDonation() {
		const category = app.donationList.getAttribute('data-donation-category');
		const page = Number(app.donationList.getAttribute('data-donation-page'));
		const apiUrl = app.donationList.getAttribute('data-api-url');
		const url = category ? `${apiUrl}?page=${page}&kategori=${category}` : `${apiUrl}?page=${page}`;

		app.isLoading = true;

		try {
			const response = await fetch(url);
			const json = await response.json();

			if (json && json.data && json.data.length === 0) {
				app.donationLoading.remove();
				clearInterval(app.fetchingInterval);
			} else {
				json.data.forEach(donation => {
					const donationItem = app.createDonationItem({
						slug: donation.url,
						img: donation.dokumentasi,
						title: donation.nama_kegiatan,
						percentProgress: donation.percent,
						earn: Number(donation.actual_earn),
						daysRemaining: donation.left_day,
					});
					app.donationList.appendChild(donationItem);
				});

				app.donationList.setAttribute('data-donation-page', page + 1);
			}
		} catch (e) {
			console.error(`[API Error]: ${e.message}`);
			app.donationLoading.remove();
		} finally {
			app.isLoading = false;
		}
	};

	app.createDonationItem = ({ slug, img, title, percentProgress, earn, daysRemaining }) => {
		const newItem = app.donationList.querySelector('.donation-item').cloneNode(true);
		const urlCampaign = newItem.getAttribute('data-href');
		const urlAsset = newItem.getAttribute('data-asset');

		newItem.querySelector('a').setAttribute('href', `${urlCampaign}/${slug}`);
		newItem.querySelector('.donation-item__img').setAttribute('src', `${urlAsset}/${img}`);
		newItem.querySelector('.donation-item__img').setAttribute('alt', title);
		newItem.querySelector('.donation-item__title').textContent = title;
		newItem.querySelector('.progress-bar').style.width = `${percentProgress}%`;
		newItem.querySelector('.nominal:first-child .nominal__value').textContent = `Rp ${thousandSeparator(earn)}`;
		newItem.querySelector('.nominal:last-child .nominal__value').textContent = daysRemaining;

		return newItem;
	};
  
  app.toggleShowPassword = function(elem) {
    if (elem.classList.contains('active')) {
			elem.classList.remove('active');
      elem.parentNode.querySelector('input').setAttribute('type', 'password');
    } else {
      elem.classList.add('active');
      elem.parentNode.querySelector('input').setAttribute('type', 'text');
    }
	};

	/**
	 * EVENT LISTENERS
	 */
	app.btnBack && app.btnBack.addEventListener('click', (e) => {
		if (e.currentTarget.getAttribute('data-disabled')) {
			return;
		} else {
			window.history.back();
		}
	});
	
	app.iconShowPass && Array.prototype.forEach.call(app.iconShowPass, function(elem) {
		elem.addEventListener('click', function() {
			app.toggleShowPassword(this);
		});
	});

	app.accordion && Array.prototype.forEach.call(app.accordion, elem => {
		const accordHeader = elem.querySelector('.by-accordion-header');

		accordHeader.addEventListener('click', () => {
			elem.classList.toggle('collapsed');
		});
	});

	app.inputNumbers && Array.prototype.forEach.call(app.inputNumbers, elem => {
		setInputFilter(elem, value => {
			return /^\d*$/.test(value);
		});
	});

	document.addEventListener('click', (e) => {
		/* TABS */
		if (e.target && e.target.matches(TAB_LINK_CLASS)) {
			// prevents link from making navigation
			e.preventDefault();

			const tabPanes = document.querySelectorAll(TAB_PANE_CLASS);
			const tabLinks = document.querySelectorAll(TAB_LINK_CLASS);
			const tabPaneTarget = e.target.getAttribute('href');
			
			Array.prototype.forEach.call(tabLinks, tabLink => {
				tabLink.classList.remove('active');

				if (tabLink === e.target) {
					tabLink.classList.add('active');
				}
			});

			Array.prototype.forEach.call(tabPanes, tabPane => {
				tabPane.classList.remove('show');

				if (tabPane.matches(tabPaneTarget)) {
					tabPane.classList.add('show');
				}
			});
		}
		/* END OF TABS */
	});

	window.addEventListener('load', () => {
		if ('IntersectionObserver' in window && app.donationLoading) observer.observe(app.donationLoading);
	});

	/**
	 * INITIALIZATIONS
	 */
	app.init();
})();
