import './bootstrap';

const oddElements = document.querySelectorAll('.substitution-date');
oddElements.forEach(function (e) {
    const oddParent = e.closest('.odd');
    if (oddParent) {
        oddParent.classList.add('extra-padding-for-odd');
    }
});
