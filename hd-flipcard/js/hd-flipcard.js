function setBackSize() {

	let flipcards = document.querySelectorAll('.hd-flipcard');

	let i = flipcards.length;

	while (i--) {

		let flipcard = flipcards[i],
		    front    = flipcard.querySelector('.el-card'),
		    back     = flipcard.querySelector('.el-card-back');

		front.style.removeProperty('min-height');
		back.style.removeProperty('height');


		if (front.offsetHeight < back.offsetHeight) {
			front.style.minHeight = back.offsetHeight + 'px';
		} else {
			back.style.height = '100%';
		}

	}

};

window.addEventListener('load', setBackSize);
window.addEventListener('resize', setBackSize);