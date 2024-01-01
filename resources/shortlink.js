
document.getElementById('urlForm').addEventListener('submit', function (event) {
    event.preventDefault();

    let url = document.getElementById('url').value;

    // AJAX-запрос для сокращения URL
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let shortUrlElement = document.getElementById('shortUrl');
            let shortUrlLink = window.location.href + `?s=` + xhr.responseText.replace(/\s/g, '');
            shortUrlElement.innerText = 'Короткий URL:     ' + shortUrlLink;

            //Кнопка копирования ссылки
            let copyButton = document.createElement('button');
            copyButton.textContent = 'Скопировать ссылку';
            copyButton.classList.add('copylink-button');
            copyButton.addEventListener('click', function () {
                copyToClipboard(shortUrlLink);
            });

            shortUrlElement.appendChild(copyButton);
        }
        document.getElementById('url').value = '';
    };

    //Метод для копирования ссылки
    function copyToClipboard(text) {
        let textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        alert('Ссылка скопирована!');
    }

    xhr.send('url=' + encodeURIComponent(url));

});