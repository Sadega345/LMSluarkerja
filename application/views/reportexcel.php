 <table border="1" width="100%">
    <thead>
        <tr>
            <?php
            foreach($head_data as $head){
                ?>
                <th><?php echo $head ?></th>
                <?php
            }
            ?>
        </tr>
    </thead>
      <tbody>
 
           <?php $i=1; foreach($data->result() as $buk) { ?>
 
           <tr>
                <?php
                foreach($body_data as $body){
                    $field=$body;
                    if(strpos( strtolower($body), ' as ') !== false){
                        $exb=explode(" as ",strtolower($body));
                        $field=$exb[1];
                    }
                    ?>
                    <td><?php echo $buk->$field; ?></td>
                    <?php
                }
                ?>
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>