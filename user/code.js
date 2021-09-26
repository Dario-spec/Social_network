  //add friends

  function add_friend(el){
  
    const xmlhttp = new XMLHttpRequest();
  
  xmlhttp.onload = function () {
   
      document.getElementById('alert').innerHTML = this.responseText;
      
  
      
     
  }
  
  xmlhttp.open("GET", "add_friend.php?username=" + el.getAttribute('data-id'));
  xmlhttp.send();
  
  setTimeout(function(){
  location.reload();
  },800)
  
  }
  
  
  function confirm(el){
      
    const xmlhttp = new XMLHttpRequest();
  
  xmlhttp.onload = function () {
   
      document.getElementById('alert').innerHTML = this.responseText;
      
  
      
     
  }
  
  xmlhttp.open("GET", "confirm.php?username=" + el.getAttribute('data-id'));
  xmlhttp.send();
  
  setTimeout(function(){
  location.reload();
  },800)
  
  }

  

  setInterval(()=>{

    const xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onload = function () {
     
        document.getElementById('notifications_div').innerHTML = this.responseText;
      
    
        
       
    }
    
    xmlhttp.open("GET", "notifications.php");
    xmlhttp.send();
    
    },500)
    
    
    function deleteFriend(el){
      let soure = confirm("Are you sure to execute this action?");
    if(soure){
      const xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onload = function () {
    
      
    
    
      
     
    }
    
    xmlhttp.open("GET", "deleteFriend.php?username=" + el.getAttribute("data-id"));
    xmlhttp.send();
    }else{
    
    }
    
    }