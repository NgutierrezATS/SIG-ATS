<br>
<div class="container-fluid">

    <div class="portlet light">
        <div class="portlet-body">
            <div class="row">

                <div class="col-md-4 col-sm-12 order-md-1 order-sm-2">
                    <br>
                    <center>
                        <h4><strong>Casa Matriz - Santiago</strong></h4>
                        <p>El juncal 350 Quilicura.</p>
                        <p>Lun - Vie 08:00 - 18:00</p>
                        <p>Sab 08:00 - 15:00</p><br>
                    </center>
                    <br>
                    <div class="container">
                        <p><iframe class=" col-md-12 border border-success rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.6892980801235!2d-70.70775558514828!3d-33.32693739856928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c75785927bed%3A0x8a51dd4c2128271f!2sAts+Maquinarias!5e0!3m2!1ses-419!2scl!4v1530566528229" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                    </div>

                </div>
                <div class="col-md-4 col-sm-12 order-md-2 order-sm-1 border border-success rounded">
                    <br>
                    <center>
                    <form action="<?php echo site_url(); ?>/contacto/send" accept-charset="utf-8" method="POST">
                        <center><h3><strong>Contactate con nosotros</strong></h3></center>
                        <br>
                        <div class="row col-md-12">
                            <label for="empresa">Empresa:</label>
                            <input type="text" class="form-control" name="empresa"  placeholder="Ejemplo: Mi Empresa S.A" maxlength="50" required>
                        </div>
                        <br>
                        <div class="row col-md-12">
                            <label for="rut">Rut Empresa:</label>
                            <input type="text" class="form-control" name="rut"  placeholder="Ejemplo: 123456789-k" maxlength="13" required>
                        </div>
                        <br>
                        <div class="row col-md-12">
                            <label for="email" >Correo Electronico:</label>
                            <input type="email" class="form-control" name="email"  placeholder="Ejemplo: agonzales@gmail.com" maxlength="30" required>
                        </div>
                        <br>
                        <div class="row col-md-12">
                            <label for="numero">Numero de contacto:</label>
                            <input type="tel" class="form-control" name="numero"  maxlength="12" placeholder="Fijo o movil" required/></span>
                        </div>
                        <br>
                        <div class="row col-md-12">
                            <label for="altura">Tipo de maquinaria</label><br>
                            <select class="form-control  select2 select2-hidden" name="tipo" required>

                                <?php foreach ($tipos as $tipo): ?>
                                    <option value="<?php echo $tipo->TIPO ?>"><?php echo $tipo->TIPO; ?></option>       
                                <?php endforeach ?>
                                <option >Otro</option>
                            </select>
                            
                        </div>
                        <br>
                        <div class="row col-sm-12">
                            <label for="mensaje">Mensaje:</label>
                            <textarea class="form-control" name="mensaje" rows="3" placeholder="" maxlength="250"></textarea>
                        </div>
                        <br>
                        <center><button name="boton" type="submit" class="btn btn-ats ">Enviar contacto</button></center>

                    </form>
                </center>
                    <br>
                </div>
                <div class="col-md-4 col-sm-12  order-sm-3">
                    <br>
                    <center>
                        <h4><strong>Sucursal Norte - Antofagasta</strong></h4>
                        <p>Ruta el cobre s/n lote 7, sector industrial la Negra.</p>
                        <p>Lun - Vie 08:00 - 18:00</p>
                        <p>sab 08:00 - 15:00</p><br>
                    </center>
                    <br>
                    <div class="container">
                        <p><iframe class=" col-md-12 border border-success rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9403629616386!2d-70.30450068483702!3d-23.749505984589785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDQ0JzU4LjIiUyA3MMKwMTgnMDguMyJX!5e0!3m2!1ses-419!2scl!4v1531348761252" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</form>
</div>

<script>
    $(function(){
        $('.select2').select2();

    });
</script>