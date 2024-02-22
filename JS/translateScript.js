

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
    }, 'google_translate_element');
}


var style = document.createElement('style');


var cssText = `
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }
    body:not(.goog-te-banner-frame) {
        top: 0px !important;
    }
    iframe.skiptranslate {
        z-index: 0; /* Значение z-index, чтобы поднять элемент над контентом */
    }
`;


style.appendChild(document.createTextNode(cssText));


document.head.appendChild(style);
