var Alert = new CustomAlert();
function CustomAlert(){
  this.render = function(){
      //Show Modal
      let popUpBox = document.getElementById('popUpBox');
      popUpBox.style.display = "block";
      //Close Modal
      // document.getElementById('closeModal').innerHTML = '<button onclick="Alert.ok()">OK</button>';
  }

  
this.ok = function() {
  document.getElementById('popUpBox').style.display = "none";
  document.getElementById('popUpOverlay').style.display = "none";
  }
}


// profile remove claimed rewards:


// document.querySelector(".confirm").addEventListener("click",(event)=>{
//     event.target.closest(".rewards").remove();
// })
document.querySelector(".confirm-1").addEventListener("click",(event)=>{
  event.target.closest(".rewards-1").remove();
})
document.querySelector(".confirm-2").addEventListener("click",(event)=>{
    event.target.closest(".rewards-2").remove();
})
document.querySelector(".confirm-3").addEventListener("click",(event)=>{
    event.target.closest(".rewards-3").remove();
})