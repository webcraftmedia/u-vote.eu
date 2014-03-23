<!--<form class="navbar-form pull-right" id="form_login">
              <input class="span2" type="text" id="login_email" placeholder="E-Mail">
              <input class="span2" type="password" id="login_password" placeholder="Passwort">
              <button type="submit" class="btn">Login</button>
</form> -->
<form class="navbar-form navbar-right" id="form_login">
    <!--<div class="control-group">
        <div id="help-block"></div>
        <input type="hidden" />
        <div id="controls">
            <input  type="text"
                    size="20"
                    style=""
                    id="bt_login_user"
                    placeholder="${user_name_login}"
                    minlength="3" data-validation-minlength-message="${register_user_name_too_short}"
                    maxlength="16" data-validation-maxlength-message="${register_user_name_too_long}"
                    required data-validation-required-message="${register_user_name_required}"/>
        </div>
        <div id="controls2" style="float: right;margin-right: 20px;">
            <input  type="password"
                    size="20"
                    style=""
                    id="bt_login_password"
                    placeholder="${user_password_login}"
                    minlength="5" data-validation-minlength-message="${register_password_too_short}"
                    maxlength="16" data-validation-maxlength-message="${register_user_password_too_long}"
                    required data-validation-required-message="${register_user_password_required}"/>
        </div>
    </div>
    -->
     <div class="form-group">
          <div id="help-block"></div>
          <input  type="text"
                    size="20"
                    style=""
                    id="bt_login_user"
                    placeholder="${user_name_login}"
                    minlength="3" data-validation-minlength-message="${register_user_name_too_short}"
                    maxlength="16" data-validation-maxlength-message="${register_user_name_too_long}"
                    required data-validation-required-message="${register_user_name_required}"/>
          <input  type="password"
                    size="20"
                    style=""
                    id="bt_login_password"
                    placeholder="${user_password_login}"
                    minlength="5" data-validation-minlength-message="${register_password_too_short}"
                    maxlength="16" data-validation-maxlength-message="${register_user_password_too_long}"
                    required data-validation-required-message="${register_user_password_required}"/>
    </div>
    <button class="btn btn-primary" type="submit" id="login_submit">${login}</button>
</form>