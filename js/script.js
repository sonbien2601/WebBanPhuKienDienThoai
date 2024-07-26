//----------------------------Menu-item--------------------
const toP = document.querySelector(".top")
window.addEventListener("scroll",function(){
    const X = this.pageXOffset;
    if(X>1){
        this.top.classList.add("active")
    }
    else{
        this.top.classList.remove("active")
    }
})
//---------------------------Menu-SLIDERBAR-CATEGORY-----------------
const itemSliderbar = document.querySelectorAll(".category-left-li")
itemSliderbar.forEach(function(menu,index){
    menu.addEventListener("click",function(){
        menu.classList.toggle("block")
    })
})
//------------------------------Product-----------------------------------
const bigImg = document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img")

smallImg.forEach(function(imgItem,X){
    imgItem.addEventListener('click',function(){
        bigImg.src = imgItem.src
    })
})



// //đổi qua đổi lại thông số và chi tiết
// const thongso = document.querySelector(".thongso");
// const chitiet = document.querySelector(".chitiet");
// if (thongso) {
//   thongso.addEventListener("click", function() {
//     document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none";
//     document.querySelector(".product-content-right-bottom-content-thongso").style.display = "block";
//   });
// }

// if (chitiet) {
//   chitiet.addEventListener("click", function() {
//     document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block";
//     document.querySelector(".product-content-right-bottom-content-thongso").style.display = "none";
//   });
// }

// const butTon = document.querySelector(".product-content-right-bottom-top");
// if (butTon){
//     butTon.addEventListener("click", function(){
//         document.querySelector(".product-content-right-bottom-big").classList.toggle("activeB")
//     })
// }