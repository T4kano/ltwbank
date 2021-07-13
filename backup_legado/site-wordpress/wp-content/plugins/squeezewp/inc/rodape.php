<?php 
    $usar_rodape = get_field('exibir_rodape');
    if($usar_rodape == '1') {
        $cor_rodape = get_field('cor_rodape');
        $texto_rodape = get_field('texto_do_rodape')
?>
        <style>
            #footer{
                background-color: <?php echo $cor_rodape; ?>;
            }
        </style>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $texto_rodape; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<?php } ?>