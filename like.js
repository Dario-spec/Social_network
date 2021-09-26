function like_post(el) {
    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onload = function () {
        let id = el.getAttribute('data-post-id');
        document.getElementById('likes_' + id).innerText = this.responseText;
        
        document.getElementById("like" + id).style.display = "none";
        document.getElementById("unlike" + id).style.display = "inline-block";
        
        
       
    }
    
    xmlhttp.open("GET", "like_post.php?id=" + el.getAttribute('data-post-id'));
    xmlhttp.send();
}



    
    
    