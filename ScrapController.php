<?php

class ScrapController {

    private $apiKey = 'AIzaSyC8S77DnAzZv_KP0216ccpA0PpJcq46TGE';
    private $maxResults = 12;
    private $channelName = [];
    private $params = [];
    private $id = [];
    private $total;
    
    public function __construct($requests) {
        $this->total = count($requests);
        for($i = 0; $i < count($requests); $i++){
            array_push($this->channelName, $requests[$i][0]);
            array_push($this->params, $requests[$i][1]);
            array_push($this->id, $i);
        }
        $this->request();
    }

    public function request(){
        for($i = 0; $i < $this->total; $i++){
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://www.googleapis.com/youtube/v3/search?key='.$this->apiKey.'&maxResults='.$this->maxResults.'&order=date&channelId='.$this->params[$i]
            ]);

            $response = curl_exec($curl);

            // set user permission
            // $user = shell_exec("whoami");
            
            $id = $this->id[$i];
            $file = "response/$id.json";
            $responseFile = fopen($file, "w");
            fwrite($responseFile, $response);
        }
    }
    
}

new ScrapController([
    ['Código Fonte TV', 'UCFuIUoyHB12qpYa8Jpxoxow'],
    ['Robson V. Leite', 'UCw6vF0DoeshwUcmBnjUe2ZQ'],
    ['Bro Code', 'UC4SVo0Ue36XCfOyb5Lh1viQ'],
    ['Celke', 'UC5ClMRHFl8o_MAaO4w7ZYug'],
    ['Node Studio Treinamentos', 'UCZZ0NTtOgsLIT4Skr6GUpAw'],
    ['Lucas Silva', 'UC6jsPbjXpmzeJfPW5wcLlWA'],
    ['Excript', 'UCRu4BNG9k_BRUu-aCYJsgHg'],
    ['TechCode', 'UCBJKi6wqJPj0wEU4U2bf_Bg'],
    ['Webdesign em foco', 'UCL-mk7btv-dHI5hY2Tl1GHg'],
    ['Bora codar', 'UC2PXQzNpkXz28w9W0c-LXWQ'],
    ['Jeterson', 'UCCNcpAaReCIELrQnsXX11kw'],
    ['Clube Full Stack', 'UCR26qtZ2AUqh2Tdx0ep6lQg'],
    ['3DSNC', 'UCrb-1i8j3lclMOx7QrBhOdQ'],
    ['Online web', 'UC8xTHK97Ng__KZvGcO_K7CA'],
    ['Dev ed', 'UClb90NQQcskPUGDIXsQEz5Q'],
    ['Brad Traversy', 'UC29ju8bIPH5as8OGnQzwJyA'],
    ['Academia dos devs', 'UCxyPrtIACj5KUMwfjKsYBeg'],
    ['Jamerson Souza', 'UCikyKGm0rhvSFy5J4D9d-hw'],
    ['Reece Keney', 'UCD3rWzjFSdD4D6I1hxmcGJA'],
    ['Kabucation', 'UCiqnRXPAAk6iv2m47odUFzw'],
    ['SoftwareEngineeringStudend', 'UCyjEXAHK8xfRmlnkat2ympQ']
    ['SoengSouy Webdesign', 'UC3hmSvBOttz62UEkfHLxu5Q'],
    ['Better Csharp blog', 'UCS3W5vFugqi6QcsoAIHcMpw']
]);
