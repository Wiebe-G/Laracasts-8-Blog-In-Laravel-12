import './bootstrap';

const textarea = document.getElementById('commentBody');
document.addEventListener('DOMContentLoaded', () => {
	if(textarea) {
		textarea.textContent = '';
	}
})

const slugInput: HTMLInputElement = <HTMLInputElement>document.getElementById('slug');
const titleInput: HTMLInputElement = <HTMLInputElement>document.getElementById('title');

if(titleInput){
	titleInput.addEventListener('input', () => {
		slugInput.value = titleInput.value.trim().toLowerCase().replace(/\s+/g, "-");
	})
}

