    document.getElementById('downloadBtn').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'download_pdf.php', true);
        xhr.responseType = 'blob'; 
        xhr.onload = function() {
            if (this.status === 200) {
                var blob = this.response;
                console.log('Received blob:', blob);
                var blob = new Blob([this.response], {type: 'application/pdf'});
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'ticket.pdf';
                link.click();
            }
        };
        xhr.send();
    });

