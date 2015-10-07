<form class="navbar-form navbar-right" id="form_login">
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
                    <button class="btn btn-primary" type="submit" id="login_submit"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;${login}</button>
</form>