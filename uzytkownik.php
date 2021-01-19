<?php

session_start();
$accessToken = $_SESSION['my_accessToken'] ;

if($accessToken == ""){
    die(error('Brak tokenu'));

}
$url ='https://api.github.com/user';

function apiAuthorized($url)
{
    $options = [
        'http' => [
            'header' => "User-Agent: php/7\r\n" .
                "Authorization: token " . $_SESSION['my_accessToken'] . "\r\n",
            'method' => 'GET'
        ]];
    $context = stream_context_create($options);
    return json_decode(file_get_contents($url, false, $context));
}


 $authHeader = 'Authorization: token ' . $accessToken;
 $userAgnetHeader = 'User-Agent: Demo';
    
 
   
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', $authHeader, $userAgnetHeader));
    $response= curl_exec($ch);
    curl_close ($ch);
    $data = json_decode($response, true);

    //var_dump($data);
            echo '<br>';echo '<br>';
            echo '<a href= "http://localhost:81/projektPBSK/wyloguj.php"> Wylogoj</a>';

            echo '<br>';

            echo $data['login']; echo '<br>';
            echo $data['created_at']; echo '<br>';
            echo $data['public_repos'];echo '<br>';  
            
         
            $repos = apiAuthorized($data['repos_url']);
           
        

            if (count($repos) > 0) {
                ?>
              <table class="table">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nazwa</th>
                  <th scope="col">Opis</th>
                  <th scope="col">Język</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($repos as $key => $r) {
                    ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><a href="<?= $r->html_url ?>"><?= $r->name ?></a></td>
                    <td><?= $r->description ?></td>
                    <td><?= $r->language ?></td>
                  </tr>
                    <?php
                }
                ?>
                </tbody>
              </table>
                <?php
            }
        
        
       
?>

