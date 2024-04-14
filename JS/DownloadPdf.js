    document.getElementById('downloadBtn').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'download_pdf.php', true);
        xhr.responseType = 'blob'; // указываем, что мы ожидаем ответ в виде blob (бинарные данные)
        xhr.onload = function() {
            if (this.status === 200) {
                var blob = new Blob([this.response], {type: 'application/pdf'});
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'ticket.pdf';
                link.click();
            }
        };
        xhr.send();
    });

