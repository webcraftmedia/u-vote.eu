<div>
    <a class="btn" id="btn_register_form" align="left"></a>

      <div class="control-group" id="control-group_register_form">
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
        <div class="control-group" id="control-group_register_form2">
        <div class="controls">
            <input  type="password"
                    size="30"
                    id="bt_login_password2"
                    placeholder="${loginPassword}"
                    data-validation-matches-match="login_password"
                    data-validation-matches-message="${register_password_dont_math}"/>

        </div>
        <label><input type="checkbox" id="remember_me">  ${login_rememberMe}</label>
        <div class="help-block"></div>
        <div id="help-block-user-password-combi-wrong">${login_not_successfull}</div>
        
        <button class="btn btn-primary" id="btn-primary_register_form" type="submit" id="login_submit">${login}</button>
                <input type="hidden" />
    </div>

    
</div>



    
    