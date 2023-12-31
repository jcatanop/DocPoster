
<div class="container my-5">
  <div class="accordion accordion-flush" id="accordionFlushExample">
<?php
    $dir = opendir($dirListsJSON);
    $i = 0;
    while (($file = readdir($dir)) !== false)  {
      if ($file != "." && $file != "..") {
        $lists = json_decode( file_get_contents($dirListsJSON.'/'.$file) , false );
        $heading = "heading".$i;
        $collapse = "collapse".$i;  ?>
    <div class="accordion-item">
      <h2 class="accordion-header" id="<?php echo "$heading"; ?>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo "$collapse"; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
          <b><?php echo strtoupper($lists->area); ?></b>
        </button>
      </h2>
      <div id="<?php echo "$collapse"; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo "$heading"; ?>" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
<?php     $b = 0;
          foreach ($lists->docs as $doc){
          $headingson = "headingson".$b;
          $collapseson = "collapseson".$b; ?>
          <div class="card text-dark bg-light m-3" style="width: 100%">
            <div class="card-header">
              <h5 class="card-title">
                <a href="./files/<?php echo $doc->file; ?>" target="_blank"><?php if($doc->type == 'SOP'){ ?><i class="bi bi-people-fill"></i> <?php } if($doc->type == 'INS'){ ?> <i class="bi bi-person"></i> <?php } if($doc->type == 'SOP'){ echo $doc->name; }  if($doc->type == 'INS'){ echo $doc->name; } ?></a> 
<?php           $DateTime = DateTime::createFromFormat('d/m/Y', $doc->date);
                $limitdate = strtotime($DateTime->format('m/d/Y')) + 2 * 2600000;
                if($limitdate > time()){?>
                  <span class="badge bg-danger">New</span>
<?php           } ?>
              </h5>  
            </div>
            <div class="card-body">
              <p><?php echo "$doc->code"; ?> , Version <?php echo "$doc->version"; ?>  (<?php echo "$doc->date"; ?>)</p>
<?php           if(isset($doc->annexes)){ ?> 
              <h5>ANEXXES</h5>
              <ul class="list-group">
<?php           foreach($doc->annexes as $annex){ ?>
                <li class="list-group-item">
                  <a href="./files/<?php echo $annex->file; ?>" target="_blank"> 
                  <?php echo $annex->code; ?> <?php echo $annex->name; ?> 
                  </a>
                </li>
<?php           } ?>
              </ul>
<?php         } ?>
            </div>
          </div>
<?php     $b++;
          } ?>
        </div>
      </div>
    </div>

<?php }
      $i++;
    }
    closedir($dir); ?> 
  </div>
</div>
