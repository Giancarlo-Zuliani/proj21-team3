document.addEventListener('DOMContentLoaded', function() {

    //BANNER ID
    const deleteBanner = document.getElementsByClassName("delete-banner");
    // TRASH ICON
    const trash = document.getElementsByClassName("fa-trash-alt");
    for (let i = 0; i < trash.length; i++) {
        trash[i].addEventListener('click', function() {
            deleteBanner[i].classList.toggle("show");
        })
    }
});