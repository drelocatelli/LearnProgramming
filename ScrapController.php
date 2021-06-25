<?php

class ScrapController {

    private $apiKey = 'AIzaSyCIduIjDd08ScxcXGwKKyhxatvDFhwSh1U';
    private $maxResults = 12;
    private $channelName;
    private $params;
    private $id;
    
    public function __construct($id, $channelName, $params) {
        $this->channelName = $channelName;
        $this->params = $params;     
        $this->id = $id;
        
        print $this->request();
    }

    public function request(){
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://www.googleapis.com/youtube/v3/search?key='.$this->apiKey.'&maxResults='.$this->maxResults.'&order=date&channelId='.$this->params
        ]);

        $response = curl_exec($curl);

        // set user permission
        $user = shell_exec("whoami");
        
        $file = "response/$this->id.json";
        $responseFile = fopen($file, "w");
        fwrite($responseFile, $response);
    }
    
}

new ScrapController(1, 'Código Fonte TV', 'UCFuIUoyHB12qpYa8Jpxoxow');
new ScrapController(2, 'Robson V. Leite', 'UCw6vF0DoeshwUcmBnjUe2ZQ');
new ScrapController(3, 'Bro Code', 'UC4SVo0Ue36XCfOyb5Lh1viQ');
new ScrapController(4, 'Celke', 'UC5ClMRHFl8o_MAaO4w7ZYug');
new ScrapController(5, 'Node Studio Treinamentos', 'UCZZ0NTtOgsLIT4Skr6GUpAw');
new ScrapController(6, 'Lucas Silva', 'UC6jsPbjXpmzeJfPW5wcLlWA');
new ScrapController(7, 'Excript', 'UCRu4BNG9k_BRUu-aCYJsgHg');
new ScrapController(8, 'TechCode', 'UCBJKi6wqJPj0wEU4U2bf_Bg');
new ScrapController(9, 'Webdesign em foco', 'UCL-mk7btv-dHI5hY2Tl1GHg');
new ScrapController(10, 'Bora codar', 'UC2PXQzNpkXz28w9W0c-LXWQ');
new ScrapController(11, 'Jeterson', 'UCCNcpAaReCIELrQnsXX11kw');
new ScrapController(12, 'Clube Full Stack', 'UCR26qtZ2AUqh2Tdx0ep6lQg');
new ScrapController(12, '3DSNC', 'UCrb-1i8j3lclMOx7QrBhOdQ');
new ScrapController(13, 'Online web', 'UC8xTHK97Ng__KZvGcO_K7CA');
new ScrapController(14, 'Dev ed', 'UClb90NQQcskPUGDIXsQEz5Q');







print 'Foi gerado arquivo response';