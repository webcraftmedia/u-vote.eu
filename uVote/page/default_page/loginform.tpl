<!--<form class="navbar-form pull-right" id="form_login">
              <input class="span2" type="text" id="login_email" placeholder="E-Mail">
              <input class="span2" type="password" id="login_password" placeholder="Passwort">
              <button type="submit" class="btn">Login</button>
</form> -->

<form class="navbar-form pull-right" style="" id="form_login">
    <div class="control-group">
        <div class="controls" style="float: left;">
            <input  type="text"
                    size="20"
                    style=""
                    id="bt_login_user"
                    placeholder="${sai_mod_login_username}"
                    minlength="3" data-validation-minlength-message="${sai_error_mod_login_username_too_short}"
                    maxlength="16" data-validation-maxlength-message="${sai_error_mod_login_username_too_long}"
                    required data-validation-required-message="${sai_error_mod_login_username_required}"/>
        </div>
        <div class="controls" style="float: left;">
            <input  type="password"
                    size="20"
                    style=""
                    id="bt_login_password"
                    placeholder="${sai_mod_login_password}"
                    minlength="5" data-validation-minlength-message="${sai_error_mod_login_password_too_short}"
                    maxlength="16" data-validation-maxlength-message="${sai_error_mod_login_password_too_long}"
                    required data-validation-required-message="${sai_error_mod_login_password_required}"/>
        </div>        
        <div class="help-block"style="float: left;"></div>
        <input type="hidden" />
        <button class="btn btn-primary" style="float: left; height: 32px; font-size: 13px;"
                type="submit"
                id="login_submit">${sai_mod_login_login}</button>
    </div>
</form>