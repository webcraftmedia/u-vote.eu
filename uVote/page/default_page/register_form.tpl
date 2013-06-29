<div>
    <br>
<form class="form-horizontal" id="form_register" align="right">

<h2 style="" align="right">Accounterstellung<h2>

      <div class="control-group">
        <div class="controls">
            <input  type="text"
                    size="30"
                    style="margin-bottom: 15px;"
                    id="bt_login_user"
                    placeholder="${loginUsername}"
                    data-validation-email-message="${check_mail_format}"
                    required data-validation-required-message="${email_required}"/>
        </div>

        <div class="controls">
            <input  type="password"
                    size="30"
                    style="margin-bottom: 15px;"
                    id="bt_login_password"
                    placeholder="${loginPassword}"
                    minlength="5" data-validation-minlength-message="${login_password_too_short}"
                    required data-validation-required-message="${login_password_required}"/>
        </div>
        
        <div class="controls">
            <input  type="password"
                    size="30"
                    style="margin-bottom: 15px;"
                    id="bt_login_password2"
                    placeholder="${loginPassword}"
                    data-validation-matches-match="user_register_password1"
                    data-validation-matches-message="${register_password_dont_math}"/>

        </div>
        <label><input type="checkbox" id="remember_me" style="margin-top: -1px;">  ${login_rememberMe}</label><br />
        <div class="help-block"></div>
        <div id="help-block-user-password-combi-wrong" style="display: none"><font color="red">${login_not_successfull}</font></div>
        <input type="hidden" />
        <button class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;"
                type="submit"
                id="login_submit">${login}</button>
    </div>
</form>
    
</div>
<br>

<div id="user-button-wrapper-logged-out" style="display: none;">
                        <div id="user-button" class="btn-group pull-right">
                            <a class="btn btn-primary dropdown-toggle disableKeyEvents" data-toggle="dropdown" href="#" id="show_login_form">
                                <i class="icon-user icon-white"></i> ${login} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" style="padding: 15px;">
                                <form class="textbox" id="login_form">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input  type="text"
                                                    size="30"
                                                    style="margin-bottom: 15px;"
                                                    id="bt_login_user"
                                                    placeholder="${loginUsername}"
                                                    minlength="3" data-validation-minlength-message="${login_username_too_short}"
                                                    required data-validation-required-message="${login_username_required}"/>
                                        </div>

                                        <div class="controls">
                                            <input  type="password"
                                                    size="30"
                                                    style="margin-bottom: 15px;"
                                                    id="bt_login_password"
                                                    placeholder="${loginPassword}"
                                                    minlength="5" data-validation-minlength-message="${login_password_too_short}"
                                                    required data-validation-required-message="${login_password_required}"/>
                                        </div>
                                        <label><input type="checkbox" id="remember_me" style="margin-top: -1px;">  ${login_rememberMe}</label><br />
                                        <div class="help-block"></div>
                                        <div id="help-block-user-password-combi-wrong" style="display: none"><font color="red">${login_not_successfull}</font></div>
                                        <input type="hidden" />
                                        <button class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;"
                                                type="submit"
                                                id="login_submit">${login}</button>
                                    </div>
                                    <button type="button" class="btn btn-primary filter" style="clear: left; width: 100%; height: 32px; font-size: 13px;"
                                        id="user-register-btn" url="?module=user&action=register" href="#">${register}</button>
                                </form>
                            </div>
                        </div>
                    </div>'
    
    