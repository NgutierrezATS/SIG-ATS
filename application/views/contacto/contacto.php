<br><br>
<div class="container-fluid">
    <form action="<?php echo site_url(); ?>/contacto/send" accept-charset="utf-8" method="POST">
        <div class="portlet light">
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-5  mx-3">
                        <div class="row col-sm-12">
                            <label for="empresa">Empresa:</label>
                            <input type="text" class="form-control" name="empresa"  placeholder="Ejemplo: Mi Empresa S.A" maxlength="50" required>
                        </div>
                        <br>
                        <div class="row col-sm-12">
                            <label for="rut">Rut Empresa:</label>
                            <input type="text" class="form-control" name="rut"  placeholder="Ejemplo: 123456789-k" maxlength="13" required>
                        </div>
                        <br>
                        <div class="row col-sm-12">
                            <label for="email" >Correo Electronico:</label>
                            <input type="email" class="form-control" name="email"  placeholder="Ejemplo: agonzales@gmail.com" maxlength="30" required>
                        </div>
                        <br>
                        <div class="row col-sm-12">
                            <label for="numero">Numero de contacto:</label>
                            <input type="tel" class="form-control" name="numero"  maxlength="12" placeholder="Fijo o movil" required/></span>
                        </div>
                        <br>
                        <div class="row col-sm-12">
                            <label for="altura">Tipo de maquinaria</label><br>
                            <select class="form-control  select2 select2-hidden" name="tipo" required>
                                <option selected="selected" >Ninguna en particular</option>
                                <?php foreach ($tipos as $tipo): ?>
                                    <option value="<?php echo $tipo->TIPO ?>"><?php echo $tipo->TIPO; ?></option>       
                                <?php endforeach ?>
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
                </div>
                <div class="col-md-6">
                    <div class="col-md-11 col-md-offset-1">
                        <h4>Casa Matriz - Santiago</h4>
                        <p>El juncal 350 Quilicura, Santiago de Chile.</p>
                        <p>Lun - Vie 08:00 - 18:00</p>
                        <p>Sab 08:00 - 15:00</p><br>
                        <h4>Sucursal Norte - Antofagasta</h4>
                        <p>Ruta el cobre s/n lote 7, sector industrial la Negra. Antofagasta</p>
                        <p>Lun - Vie 08:00 - 18:00</p>
                        <p>sab 08:00 - 15:00</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container"><br>
                    <iframe class="center-block" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.6892980801235!2d-70.70775558514828!3d-33.32693739856928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c75785927bed%3A0x8a51dd4c2128271f!2sAts+Maquinarias!5e0!3m2!1ses-419!2scl!4v1530566528229" width="1000" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
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