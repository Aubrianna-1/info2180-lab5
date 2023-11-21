//https://www.w3schools.com/xml/xml_http.asp
window.addEventListener('load', function() {  
    const lookup= document.getElementById("lookup");
    const lookupcities=document.getElementById("lookupcities");

    let rst = document.querySelector('.result');

    var search = document.getElementById("country")
    var xhttp= new XMLHttpRequest();
    var file;

    lookup.addEventListener('click', (event)=>{
        event.preventDefault()
        file="http://localhost/info2180-lab5/world.php"+"?country="+search.value+"&city=none";
        xhttp.onreadystatechange=function(){
            if (this.readyState == 4 && this.status == 200) {
                let data = document.getElementById("result").innerHTML = this.responseText;
                rst.textContent = '${data}';
            }
        }
        xhttp.open('GET',file, true);
        xhttp.send(); 
    })

    lookupcities.addEventListener('click', (event)=>{
        event.preventDefault()
        file="http://localhost/info2180-lab5/world.php"+"?country="+search.value+"&city=cities";
        xhttp.onreadystatechange=function(){
            if (this.readyState == 4 && this.status == 200) {
                let data = document.getElementById("result").innerHTML = this.responseText;
                rst.textContent = '${data}';

            }
        }
        xhttp.open('GET',file, true);
        xhttp.send(); 
    })
    search.value="";
})