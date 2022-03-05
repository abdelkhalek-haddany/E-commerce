function showMessage($message, $status){

    // create img box div
    let MessageBox = document.createElement("div");
    MessageBox.className="popup-message-box";
    let App = document.getElementById("app");
  
    // create the img tag
    let span = document.createElement("span");
    let Message = document.createTextNode($message);
  
    if($status == 1){
      span.className="success";
    }else{
      span.className="danger";
    }
  
    
    // create the close button
    let closer = document.createElement("span");
    let closeMark = document.createTextNode("X");
    closer.className="popup-closer";
    closer.appendChild(closeMark);
  
    //append the img and the closer to img popup box
    span.appendChild(Message);
    MessageBox.appendChild(span);
    MessageBox.appendChild(closer);
    App.appendChild(MessageBox);
    // close popup section when the click on closer item
    document.addEventListener("click", (e)=>{
        if(e.target !== MessageBox && e.target !== span){
          e.stopPropagation();
          MessageBox.remove();
        }
    });
  }