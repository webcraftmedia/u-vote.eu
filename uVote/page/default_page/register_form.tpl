<div>
    <form class="form-vertical" id="form_register" style="padding: 0;">

<h3 style="margin-top: 0;" align="left">Accounterstellung</h3>

      <div class="control-group" style="margin: 0px; padding: 0px;">
        <div class="controls">
            <input  type="text"
                    size="30"
                    id="bt_login_user"
                    placeholder="${loginUsername}"
                    data-validation-email-message="${check_mail_format}"
                    required data-validation-required-message="${email_required}"/>
        </div>

        <div class="controls">
            <input  type="password"
                    name="login_password"
                    size="30"
                    id="bt_login_password"
                    placeholder="${loginPassword}"
                    minlength="5" data-validation-minlength-message="${login_password_too_short}"
                    required data-validation-required-message="${login_password_required}"/>
        </div>
      </div>
        <div class="control-group" style="margin: 0px;">
        <div class="controls">
            <input  type="password"
                    size="30"
                    id="bt_login_password2"
                    placeholder="${loginPassword}"
                    data-validation-matches-match="login_password"
                    data-validation-matches-message="${register_password_dont_math}"/>

        </div>
        <label><input type="checkbox" id="remember_me" style="margin-top: -1px;">  ${login_rememberMe}</label>
        <div class="help-block"></div>
        <div id="help-block-user-password-combi-wrong" style="display: none"><font color="red">${login_not_successfull}</font></div>
        
        <button class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;"
                type="submit"
                id="login_submit">${login}</button>
                <input type="hidden" />
    </div>
</form>
    
</div>



    
    