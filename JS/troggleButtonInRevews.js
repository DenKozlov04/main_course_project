function ShowEdit(commentId) {
    var x = document.getElementById("editForm" + commentId);
    if (x.style.display === "none" || x.style.display === "") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

