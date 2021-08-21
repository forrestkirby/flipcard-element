/* Herzog Dupont Copyright (C) 2019–2021 Thomas Weidlich GNU GPL v3 */

function setBackSize() {

	let flipcards = document.querySelectorAll('.hd-flipcard'),
		i = flipcards.length;

	while (i--) {

		let flipcard = flipcards[i],
			front = flipcard.querySelector('.el-card'),
			back = flipcard.querySelector('.el-card-back');

		front.style.removeProperty('min-height');
		back.style.removeProperty('height');


		if (front.offsetHeight < back.offsetHeight) {
			front.style.minHeight = back.offsetHeight + 'px';
		} else {
			back.style.height = '100%';
		}

	}

}

window.addEventListener('load', setBackSize);
window.addEventListener('resize', setBackSize);

UIkit.util.ready(() => {

	UIkit.util.$$('.hd-flipcard').forEach(el => {

		let flipMode = el.dataset.flipmode;

		if (flipMode.includes('hover')) {
			if (flipMode !== 'hover, click' || !UIkit.util.hasTouch) {
				el.addEventListener('mouseenter', e => {
					e.currentTarget.classList.add('hd-flipcard-hover');
				});
			}
			el.addEventListener('mouseleave', e => {
				e.currentTarget.classList.remove('hd-flipcard-hover');
			});
		}

		if (flipMode.includes('click')) {
			el.addEventListener('click', e => {
				if (e.currentTarget.classList.contains('hd-flipcard-hover')) {
					e.currentTarget.classList.remove('hd-flipcard-hover');
				} else {
					e.currentTarget.classList.add('hd-flipcard-hover');
				}
			});
		}

	});

});