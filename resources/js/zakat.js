import Bottomsheet from './components/bottomsheet';
import Sharer from './components/sharer';
import Toaster from './components/toaster';
import copyToClipboard from './utils/copyToClipboard';
import thousandSeparator from './utils/thousandSeparator';
import { getNominalZakatProfesi } from './services/getNominalZakat';

(function(){
	/**
	 * VARIABLES
	 */
  const btnZakat = document.querySelector('.btn-zakat');
	const btnShare = document.querySelector('.btn-share-zakat');
	const btnCopy = document.querySelector('.zakat-summary__btn-copy');
	const btnPayment = document.querySelector('.zakat-payment__btn');
	const btnBack = document.querySelector('.by-nav__back');
	const btnBottomSheet = document.querySelectorAll('.btn-zakat, .btn-share-zakat');
	const bottomNav = document.querySelector('.by-bottom-nav');
	const bottomSheet = new Bottomsheet();
	const bottomSheetElems = document.querySelectorAll('[data-bottomsheet]');
	const formZakat = document.getElementById('form-zakat');
	const pageTitle = document.querySelector('.by-nav__page-title');
	const paymentItems = document.querySelectorAll('.payment-item');
	const paymentAlert = document.getElementById('payment-type-alert');
	const sectionForm = document.getElementById('section-form');
	const sectionPayment = document.getElementById('section-payment');
	const tabPanes = document.querySelectorAll('.tab-pane');
	const zakatToaster = new Toaster();
	const zakatNominal = document.querySelector('.zakat-summary-nominal');
	const zakatTotal = document.querySelector('#zakat-nominal');

	/**
	 * METHODS
	 */
	function init() {
		// init share component
		new Sharer();

		// init bottomsheet listener element
		bottomSheet.setListenerElement(btnBottomSheet);
	};

	function setActiveBottomsheet(type) {
		Array.prototype.forEach.call(bottomSheetElems, elem => {
			const bsType = elem.getAttribute('data-bottomsheet');

			if (bsType === type) {
				elem.style.display = 'block';
			} else {
				elem.style.display = 'none';
			}
		})
	}

	function setSummary(amount, nisab) {
		if (!nisab) {
			setActiveBottomsheet('zakat-empty');
		} else {
			setActiveBottomsheet('zakat-summary');
			zakatNominal.textContent = `Rp ${thousandSeparator(amount)}`;
			zakatTotal.textContent = amount;
		}
	};

	function showSection(type) {
		// default
		sectionForm.style.display = 'none';
		sectionPayment.style.display = 'none';
		pageTitle.textContent = 'Zakat';
		btnBack.removeAttribute('data-disabled');
		bottomNav.style.display = 'none';

		switch(type) {
			case 'payment':
				sectionPayment.style.display = 'block';
				pageTitle.textContent = 'Metode Pembayaran';
				btnBack.setAttribute('data-disabled', 'true');
				break;
			default:
				sectionForm.style.display = 'block';
				bottomNav.style.display = 'block';
				break;
		}
	};

	function setPayment(type, label, image) {
		const inputPaymentType = document.getElementById('zakat-payment-type');
		const inputPaymentLabel = document.querySelector('.zakat-payment__text');
		const inputPaymentImg = document.querySelector('.zakat-payment__img');

		if (type && label && image) {	
			inputPaymentType.value = type;
			inputPaymentLabel.textContent = label;
			inputPaymentImg.setAttribute('src', image);
			inputPaymentImg.style.display = 'block';
			paymentAlert.style.display = 'none';
		} else {
			inputPaymentType.value = '';
			inputPaymentLabel.textContent = 'Metode Pembayaran';
			inputPaymentImg.setAttribute('src', '');
			inputPaymentImg.style.display = 'none';
		}

		bottomSheet.showOverlay(true);
		bottomSheet.showBottomsheet(true);
		setActiveBottomsheet('zakat-summary');
		showSection('form');
	};
	

	/**
	 * EVENT LISTENERS
	 */
	formZakat.addEventListener('submit', (e) => {
		const inputPaymentType = document.getElementById('zakat-payment-type');
		if (inputPaymentType.value) {
			paymentAlert.style.display = 'none';
		} else {
			e.preventDefault();
			paymentAlert.style.display = 'block';
		}
	});

	btnZakat.addEventListener('click', () => {
		const activeTab = document.querySelector('.tab-pane.show');
		const zakatType = activeTab.id;
		const zakatParam = {};

		switch(zakatType) {
			case 'profesi':
				zakatParam.salary = parseInt(activeTab.querySelector('input[name=salary]').value.replace(/\./g, ''), 10) || 0;
				zakatParam.otherIncome = parseInt(activeTab.querySelector('input[name=other]').value.replace(/\./g, ''), 10) || 0;
				zakatParam.debt = parseInt(activeTab.querySelector('input[name=debt]').value.replace(/\./g, ''), 10) || 0;
				break;
			/* Put other zakat params here if available */
			default:
				break;
		};

		getNominalZakatProfesi(zakatParam)
			.then(response => response.json())
			.then(json => {
				const amount = json.data[0].zakat_amount;
				const nisab = json.data[0].more_than_nisab;

				setSummary(amount, nisab);
			})
			.catch(e => {
				console.error(`[API Error]: ${e.message}`);
				zakatToaster.setText('Terjadi kesalahan saat mengambil nominal zakat');
				zakatToaster.show();
			});
	});

	// when btn share clicked, set display block to share's bottomsheet content
	btnShare.addEventListener('click', () => {
		setActiveBottomsheet('share');
	});

	// when button copy clicked, nominal text content copied to clipboard then toaster show up
	btnCopy.addEventListener('click', () => {
		if (zakatNominal.textContent) {
			// copy zakat nominal number only
			copyToClipboard(zakatNominal.textContent.replace(/[^\d]*/g, ''));
			
			zakatToaster.setText('Nominal zakat tersalin');
			zakatToaster.show();
		}
	});

	// when btn back on payment section clicked, show form section back
	btnBack.addEventListener('click', (e) => {
		if (e.currentTarget.getAttribute('data-disabled')) {
			bottomSheet.showBottomsheet(true);
			bottomSheet.showOverlay(true);
	
			showSection('form');
		}
	});

	// when btn pilih metode pembayaran clicked, show payment list section
	btnPayment.addEventListener('click', () => {
		bottomSheet.showBottomsheet(false);
		bottomSheet.showOverlay(false);

		showSection('payment');
	});

	// activate button when all required inputs filled
	Array.prototype.forEach.call(tabPanes, elem => {
		const requiredInputs = elem.querySelectorAll('input[required]');

		Array.prototype.forEach.call(requiredInputs, input => {
			input.addEventListener('keyup', (e) => {
				const activeTab = input.closest('.tab-pane');
				const childRequiredInputs = activeTab.querySelectorAll('input[required]');
				let enableButton = true;

				Array.prototype.forEach.call(childRequiredInputs, childInput => {
					if (!childInput.value) {
						enableButton = false;
					}
				});

				if (enableButton) {
					btnZakat.removeAttribute('disabled');
				} else {
					btnZakat.setAttribute('disabled', 'true');
				}
			});
		});
	});

	// when payment item clicked, show form section
	Array.prototype.forEach.call(paymentItems, elem => {
		elem.addEventListener('click', e => {
			e.preventDefault();

			const paymentType = e.currentTarget.getAttribute('data-type');
			const paymentLabel = e.currentTarget.getAttribute('data-label');
			const paymentImage = e.currentTarget.getAttribute('data-image');

			setPayment(paymentType, paymentLabel, paymentImage);
		});
	});

	/**
	 * INITIALIZATIONS
	 */
	init();
})();
