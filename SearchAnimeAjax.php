<?php

require ('../Ajax/configAjax.php');
require ('../Mysql.php');

if(isset($_POST['search']))
{
    $resultSeach = $_POST['search'];
    $sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.list_animes` WHERE name LIKE '%$resultSeach%' LIMIT 4");
    $sql->execute();
    $resultFetch = $sql->fetchAll();

    foreach($resultFetch as $values){
        echo '<a class="animate__animated animate__fadeIn result_anime" href="'.INCLUDE_PATH.'animes/'.$values['slug'].'">
                <div class="img_result">
                    <img src="'.INCLUDE_PATH_FULL.'img/uploads/animes/'.$values['image'].'" alt="">
                </div>
                <div class="info_result">
                    <h5>'.$values['name'].'</h5>
                    <p>Ano: '.$values['data'].'</p>
                    <p>Gênero: '.$values['genero'].'</p>
                </div>
            </a>';
    }
}