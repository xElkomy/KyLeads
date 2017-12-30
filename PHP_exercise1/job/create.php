<?php
$file = dirname(__FILE__) . '../../output/file.txt';
$data = "hello, its ".date('d/m/y H:m:s')."\n";
    
file_put_contents($file,$data, FILE_APPEND);

    ?>
        <script>
            alert('hola');
        </script>
    <?php


    ?><script src="<?php echo base_url('build/sites.bundle.js'); ?>"></script><?php