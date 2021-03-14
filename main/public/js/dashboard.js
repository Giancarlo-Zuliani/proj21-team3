document.addEventListener('DOMContentLoaded', function() {

    // // banner div
    // const deleteBanner = document.getElementsByClassName("delete-banner");
    // // trash icon
    // const trash = document.getElementsByClassName("fa-trash-alt");
    //
    // for(let i = 0; i < trash.length; i++) {
    //     trash[i].addEventListener('click', function() {
    //         deleteBanner[i].classList.toggle("show");
    //     })
    // }

    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

})
