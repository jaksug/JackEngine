<?php

/**
 * @author Boomer
 * @copyright 2012
 */
 $user = getUser();
?>
<div class="main">

<div class="title"><h2>Kategori Berita</h2></div>
<div class="main-content">
 <table class="table table-hover">


    <tbody>
<?php
foreach($data as $key=>$val){
        echo '<div class="tile">';
        
            echo '<br />';
         
        echo '</div>';
          echo '<tr>';
    echo '<td><a href="?act=kategori&id='.$val['id'].'">'.$val['name'].'</a></td>';
  
      echo '</tr>';
        }

?>
   
  
    </tbody>
    </table>
</div>
</div>