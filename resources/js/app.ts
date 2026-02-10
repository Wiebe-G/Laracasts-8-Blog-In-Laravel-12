import './bootstrap';

const textarea = document.querySelectorAll('textarea');
document.addEventListener('DOMContentLoaded', () => {
	textarea.forEach((el) => el.textContent = '');
})
