<div class="container mt-5">
  <h4>Search by: "<?php echo $search ?>" </h4>
  <ul class="list-group">

  <?php
  $dir = opendir($dirListsJSON);
  while (($file = readdir($dir)) !== false)  {
    if ($file != "." && $file != "..") {
      $lists = json_decode( file_get_contents($dirListsJSON.'/'.$file) , false );

      foreach ($lists->docs as $doc){
        if (stristr($doc->name ,$search) || stristr($doc->scope ,$search)  || stristr($doc->code , $search) ) { ?>
      
    <li class="list-group-item m-1" >
      <a href="./files/<?php echo $doc->file; ?>" target="_blank"> 
        <?php echo $doc->code; ?> <?php echo $doc->name; ?> 
      </a>
    </li>
     
        <?php
        }
        if(isset($doc->annexes)){
          foreach($doc->annexes as $annex){
            if (stristr($annex->name ,$search) || stristr($annex->code , $search)) { ?>

    <li class="list-group-item  m-1">
      <a href="./files/<?php echo $annex->file; ?>" target="_blank"> 
      <?php echo $annex->code; ?> <?php echo $annex->name; ?> 
      </a>
    </li>

      <?php 
            }
          }
        }
      } 
    }
  }
  closedir($dir); ?> 

  </ul>
</div>