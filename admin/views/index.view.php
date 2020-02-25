<?php require 'header.view.php'; ?>
<div class="container">
    <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a href="index.php"><img src="images/site_logo.png" alt=""></a>
        </div>
        <div class="col-7 pt-1 d-flex justify-content-end align-items-center">     
            <label style="color:white;">Usuario: <?php echo $_SESSION['usuario']; ?></label>
        </div>
        <div class="col-1 d-flex justify-content-end align-items-center">
            <a class="btn bg-light btn-sm btn-outline-secondary" href="logout.php">                
                <span class="ui-icon ui-icon-circle-arrow-e"></span>
            </a>
        </div>
    </div>
    </header>

    <div class="row mb-2">
    <div class="col-md-2">
        <div class="text-white card flex-md-row mb-4 box-shadow h-md-250 bg-dark">
        <div class="card-body d-flex flex-column align-items-start">
            <div class="justify-content-center">
                <form action="exportar.php" method="post" name="form1" id="form1" >
                    <label><b>Consulta de Inscripciones:</b></label>
                    <div class="form-group">
                        <label for="inp_date_init">Fecha Desde:</label>
                        <input type="text" id="inp_date_init" name="inp_date_init" class="form-control form-control-sm" placeholder="YYYY-MM-DD" required>
                    </div>
                    <div class="form-group">
                        <label for="inp_date_end">Fecha Hasta:</label>
                        <input type="text" id="inp_date_end" name="inp_date_end" class="form-control form-control-sm" placeholder="YYYY-MM-DD" required>
                    </div>
                    <button type="button" id="btn_search" class="btn btn-primary btn-block btn-sm">BUSCAR</button>
                    <button type="button" id="btn_clean" class="btn btn-secondary btn-block btn-sm">BORRAR</button>
                    <button type="submit" class="btn btn-info btn-block btn-sm" name="btn_exp_csv" id="btn_exp_csv">EXPORTAR CSV</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <div class="card-body d-flex flex-column">
        <table id="tbl_data" class="display responsive compact" style="width:100%">
            <thead>
                <tr style="text-align:center;">
                    <th style="width: 20px;">Codigo Proyecto</th>
                    <th style="width: 140px;">Fecha</th>
                    <th style="width: 550px;">Trabajo</th>
                    <th style="width: 30px;">Detalle</th>
                </tr>
            </thead>
        </table>
        </div>
        </div>
    </div>
    </div>
    <div class="modal fade bd-example-modal-xl" id="modal_detalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">DETALLE PARTICIPANTE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="detalle.php" method="POST">     
                <div class="modal-body">                               
                    <div id="table_reload" class="table-responsive">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-secondary btn-sm" name="proyecto" id="proyecto">EXCEL</button>
                </div>            
            </form>
            </div>
        </div>
    </div>
</div>
<script src="js/index.js" type="text/javascript"></script>
<?php require 'footer.view.php'; ?>
