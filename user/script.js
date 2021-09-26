function unlike_post(el) {
    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function () {
        let id = el.getAttribute('data-post-id');
        document.getElementById('likes_' + id).innerText = this.responseText;
        

        document.getElementById("like" + id).style.display = "inline-block";
        document.getElementById("unlike" + id).style.display = "none";
        
       
    }
    
    xmlhttp.open("GET", "unlike_post.php?id=" + el.getAttribute('data-post-id'));
    xmlhttp.send();
}


function who_like(el){
  

  const xmlhttp = new XMLHttpRequest();

xmlhttp.onload = function () {
    let id = el.getAttribute('data-post-id');
    document.getElementById('who').innerHTML = this.responseText;
    

    
   
}

xmlhttp.open("GET", "who_like.php?id=" + el.getAttribute('data-post-id'));
xmlhttp.send();

}

var com;
function post_comments(el){
  let id = el.getAttribute("data-post-id");
  com = id;


  read(com);


}

function comments(){
    var idd = com;
    var post = document.getElementById("comments33").value;

    if(post == ""){
      alert("Pleas fill in all fields!")
    }else{
      const xmlhttp = new XMLHttpRequest();

      xmlhttp.onload = function () {
          let id = idd;
         
          
      
          
         
      }
      
      xmlhttp.open("GET", "comments.php?id=" + idd + "&post=" + post);
      xmlhttp.send();
      document.getElementById("comments33").value = "";
      read(idd)
    }


}




function read(a){

  const xmlhttp = new XMLHttpRequest();
  var  idd2 = a;
xmlhttp.onload = function () {
      document.getElementById("post_comments222").innerHTML = this.responseText;
    

    
   
}

xmlhttp.open("GET", "read_com.php?id=" + idd2);
xmlhttp.send();



}


