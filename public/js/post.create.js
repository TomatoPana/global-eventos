const button = document.querySelector('#btn-post-create');

button.addEventListener('click', function(e) {
    const csrfToken = document.querySelector('input[name=_token]').value;
    const formData = new FormData();
    formData.append('_token', csrfToken);
    formData.append('title', document.querySelector('input[name=title]').value);
    formData.append('description', document.querySelector('input[name=description]').value);
    formData.append('body', window.editor.getData());
    formData.append('hashtags', document.querySelector('input[name=hashtags]').value);
    fetch('/posts', {
        method: 'POST',
        body: formData
    }).then(function(response) {
        if(response.ok) {
            response.json().then(function(data) {
                console.log(data);
            });
        }
    }).catch(function(error) {
        console.error(error);
    });
});
