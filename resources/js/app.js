import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

//! CUSTOM

const oddElements = document.querySelectorAll('.substitution-date');
oddElements.forEach(function (e) {
    const oddParent = e.closest('.odd');
    if (oddParent) {
        oddParent.classList.add('extra-padding-for-odd');
    }
});

const adminTools = document.querySelectorAll('.admin-tools');

adminTools.forEach((tool) => {
    if (!tool.querySelector('form')) {
        tool.style.display = 'none';
    }
});

//! MENU TOGGLE

const menuBtn = document.querySelector('.hamburger');
const mobileMenu = document.querySelector('.mobile-nav');

menuBtn.addEventListener('click', function () {
    menuBtn.classList.toggle('is-active');
    mobileMenu.classList.toggle('is-active');

})

mobileMenu.addEventListener('click', function () {
    menuBtn.classList.toggle('is-active');
    mobileMenu.classList.toggle('is-active');

})

//! MODAL NEWS WINDOW

let modal = document.querySelector('#modal');
let modalImage = document.querySelector('#modal-image');

function openModal(imageUrl) {
    modal.style.display = "flex";
    modalImage.src = imageUrl;
}

window.openModal = openModal;

function closeModal() {
    modal.style.display = "none";
}

window.closeModal = closeModal;

window.addEventListener("click", function (e) {
    if (e.target === modal) {
        closeModal();
    }
});


//! CUSTOM EDITOR
//
// let noteEditable = document.querySelector('.note-editable');
// let noteToolbar = document.querySelector('.note-toolbar');
// let noteEditor = document.querySelector('.note-editor.note-frame');
//
// noteEditable.style.background = "white";
// noteToolbar.style.background = "white";
// noteEditor.style.border = "none";
// noteEditor.style.boxShadow = "rgb(30, 30, 30) 0 0 2px";
//
// function addLink() {
//     let link = prompt("Введите адрес ссылки:");
//     let linkText = prompt("Текст отображения");
//     let linkHtml = ` <a href="${link}" target="_blank">${linkText}</a> `;
//     let textarea = document.querySelector('#news_text');
//     textarea.value += linkHtml;
// }
//
// function boldSelectedText() {
//     let textarea = document.querySelector('#news_text');
//     let selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
//     let modifiedText = ` <span style="font-weight:bold">${selectedText}</span> `;
//     textarea.value = textarea.value.substring(0, textarea.selectionStart) + modifiedText + textarea.value.substring(textarea.selectionEnd);
// }
//
// document.querySelector('#add_link').addEventListener('click', addLink);
// document.querySelector('#bold_selected_text').addEventListener('click', boldSelectedText);
