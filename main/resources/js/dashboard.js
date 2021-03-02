// document.addEventListener('DOMContentLoaded', function(){
    
//     myFunction();


//     // var deleteBanners = document.getElementsByClassName('delete-banner');
//     // var trash = document.getElementsByClassName('fa-trash-alt');
    
//     // console.log(trash);

//     // trash.addEventListener('click', function () {
        
//     //    console.log('trash');
            
//     // });

//     // function toggleBanner(id) {
//     //     deleteBanners[id].classList.toggle('show');
//     // }
//     // console.log(deleteBanners);

//     // console.log('ciao');

// }); 

// // function myFunction() {
//     var element = document.getElementById("trash").addEventListener('click', function () {
        
//         console.log(element);
//         console.log('ciao');

//     });
   
// }

// parte lo script solo quando carica l'HTML
document.addEventListener('DOMContentLoaded', function() {
    
    // banner div
    const deleteBanner = document.getElementsByClassName("delete-banner");
    
    const trash = document.getElementsByClassName("fa-trash-alt");

    for(let i = 0; i < trash.length; i++) {

        trash[i].addEventListener('click', function() {
                
            // alertBtn[i].classList.toggle("show"); 
            deleteBanner[i].classList.toggle("show"); 
            
            // console.log(alertBtn);

        })

    }
    
})

