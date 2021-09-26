

setTimeout(function(){
    
   var objDiv = document.getElementById("msg_scroll");
   var scrol = objDiv.scrollHeight
   objDiv.scrollTop = scrol
localStorage.setItem("scroll",scrol)

},3000)

function sendMessage(el){
    
    var msg = document.getElementById("message").value;
    if(msg == ""){
        alert("You can't send empty message!")
    }else{ 
     
         

        const xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onload = function () {
    
      
    
    
      
     
    }
    
    xmlhttp.open("GET", "send_msg.php?username=" + el.getAttribute("data-id") + "&msg=" + msg);
    xmlhttp.send();
    document.getElementById("message").value = "";
    
}
}


setInterval(()=>{
  


    var msg_id = document.getElementById("id_msg").value;
    const xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onload = function () {
    document.getElementById("msg_div").innerHTML = this.responseText;
      
    
    
      
     
    }
    
    xmlhttp.open("GET", "read_msg.php?id=" + msg_id);
    xmlhttp.send();
},500)



setTimeout(function(){
    
setInterval(function(){

    var scr = localStorage.getItem("scroll")

var objDiv2 = document.getElementById("msg_scroll");

var scrol2 = objDiv2.scrollHeight

console.log(scrol2)
console.log(scr)

if(scr < scrol2){
    objDiv2.scrollTop = scrol2
    localStorage.setItem("scroll",scrol2)
}


},5)
},3000)


function when(el){
    id = el.getAttribute("data-id");

    alert("Message is send on: " + id)
}