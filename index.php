<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Learn Code Channels</title>
</head>
<body>
<br>
<h1 style="color:white;">Daily Dev Learn Videos Brazil</h1>
<div id="lista">

</div>
<script>
  function requestChannel(fileUrl){

    let request = new Request(fileUrl, {
        method: 'GET',
    });


 fetch(request).then(function(response) { return response.text() }).then(function(response){
   response = JSON.parse(response)

  //  document.body.innerHTML += (`<h1><a href="https://www.youtube.com/channel/${params}" 
  // target="_blank">${channelName}</a></h1>`);
   response.items.forEach(function(videos){
  
    let url = `<li><a href="http://www.youtube.com/watch?v=${videos.id.videoId}" target="_blank"><img src="https://img.youtube.com/vi/${videos.id.videoId}/0.jpg" width="300px"></a></li>`;
    if(videos.id.videoId != undefined){
        document.querySelector('#lista').innerHTML += (url);
    }
   });

  // console.log(response)


 });

}

function sortList() {
    var list, i, switching, b, shouldSwitch;
    list = document.getElementById("lista");
    switching = true;
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      b = list.getElementsByTagName("LI");
      // Loop through all list items:
      for (i = 0; i < (b.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Check if the next item should
        switch place with the current item: */
        if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
          /* If next item is alphabetically lower than current item,
          mark as a switch and break the loop: */
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark the switch as done: */
        b[i].parentNode.insertBefore(b[i + 1], b[i]);
        switching = true;
      }
    }
  }

  function carregando(status = null){
    var modal = document.createElement('div');
    modal.id = "modal"
    modal.style.width = "100%";
    modal.style.height = "100%";
    modal.style.position = "fixed";
    modal.style.top = "0";
    modal.style.background = "#000";
    modal.style.color = "white";
    modal.style.fontSize = "100px"
    modal.innerText = "Gerando vídeos..."
    document.body.appendChild(modal);

  }

  carregando()


  window.onload = function(){
    sortList()
    document.querySelector('#modal').remove()
  }
</script>

<?php

$total = count(scandir('response'))-2;

for($i = 1; $i <= $total; $i++){
  echo "<script>
  requestChannel('response/$i.json');
  </script>";
}


?>


    
</body>
</html>




<style>
*{margin:0; padding:0; text-align: center; font-family:sans-serif;}

body{background:black;}

  li{
    list-style:none;
    display:inline;
    margin-right:24px;
  }

  img{border-radius:5px; border:1px solid #cccccc54; margin-bottom:25px;}
  img:hover{transition:border 0.8s, background 0.8s; border-color:#ccc;}
</style>
