// translateScript.js

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
    }, 'google_translate_element');
}

// Создаем стиль и вставляем его в head документа
var style = document.createElement('style');

// CSS правила для скрытия элемента настроек и поднятия над контентом
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

// Присваиваем CSS правила
style.appendChild(document.createTextNode(cssText));

// Вставляем стиль в head документа
document.head.appendChild(style);
