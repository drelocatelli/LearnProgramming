requestChannel('Robson V. Leite', 'UCw6vF0DoeshwUcmBnjUe2ZQ');
requestChannel('Código Fonte TV', 'UCFuIUoyHB12qpYa8Jpxoxow');
requestChannel('Bro Code', 'UC4SVo0Ue36XCfOyb5Lh1viQ');

function requestChannel(channelName, params){

        let apiKey = 'AIzaSyAfg9m6ANC0Kr2Gp3zG3LnOIqDw67ZrtZo';
        let maxResults = 12;

        let request = new Request('https://www.googleapis.com/youtube/v3/search?key='+apiKey+'&maxResults='+maxResults+'&order=date&channelId='+params, {
           method: 'GET',
         });


         fetch(request).then(function(response) { return response.text() }).then(function(response){
           response = JSON.parse(response)

           document.body.innerHTML += (`<h1><a href="https://www.youtube.com/channel/${params}" 
          target="_blank">${channelName}</a></h1>`);
           response.items.forEach(function(videos){
            
            let url = `<li><a href="http://www.youtube.com/watch?v=${videos.id.videoId}" target="_blank"><img src="https://img.youtube.com/vi/${videos.id.videoId}/0.jpg" width="300px"></a></li>`;
            if(videos.id.videoId != undefined){
                document.body.innerHTML += (url);
            }
           });

           console.log(response)


         });

}
