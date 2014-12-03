 <div class="panel-heading">
                        <h3 class="panel-title">Iniciar Sesión</h3>
                    </div>
    <div class="panel-body">
      
            <form role="frm_login" action="#" id="frm_login" method="POST">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Identificación" name="identificacion" type="identificacion" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">Recordarme
                        </label>
                    </div>
                    <div class="msg">
                        <label>
                            <span><?php echo is_null($msg)?"":$msg; ?></span>
                        </label>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <a href="#" onclick="frm_login.submit();" class="btn btn-lg btn-success btn-block">Autenticarse</a>
                    <a href="index.php?pac=2"  class="btn btn-warning btn-block">Regristrarse</a>
                
                </fieldset>
            </form>
    </div>