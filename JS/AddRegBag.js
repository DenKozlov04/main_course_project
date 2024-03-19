var num = 0;

function ButtonClick2(button) {
    if (num < 4) {
        num = num + 1;
        console.log(num);
        if (num >= 4) {
            document.getElementById("choose33").style.backgroundColor = "grey";
        } else {
            document.getElementById("choose33").style.backgroundColor = "#DE6A6A";
        }
    }
    if (num < 4) {
        document.getElementById("choose22").style.backgroundColor = "#DE6A6A";
    }
}

function ButtonClick1(button) {
    if (num > 0) {
        num = num - 1;
        console.log(num);
        if (num <= 0) {
            document.getElementById("choose22").style.backgroundColor = "grey";
        } else {
            document.getElementById("choose22").style.backgroundColor = "#DE6A6A";
        }
    }
    if (num > 0) {
        document.getElementById("choose33").style.backgroundColor = "#DE6A6A";
    }
}





