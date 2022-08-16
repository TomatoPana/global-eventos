const button = document.querySelector('#button-search');

button.addEventListener('click', function(e) {
    e.preventDefault();
    const text = document.querySelector('#text-search');
    if(text.value.trim() === '') return;
    const url = '/search/' + text.value;
    window.location.href = url;
});
