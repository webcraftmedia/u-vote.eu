    <div class="panel-group" id="accordion">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="glyphicon glyphicon-bookmark"></i>&nbsp;&nbsp;Willkommen auf uvote.eu!
                </h4>
            </div>                        
            <div class="panel-body row">
                
                <div id="loggedout_text" class="col-md-6" style="border-right: #d9edf7 solid 2px;">
                    ${welcome_text}
                </div>
                    <div class="col-md-6">
                    <form class="textbox" id="register_user_form">
                        <div class="control-group" id="register_username_control_group">
                            <h4><i class=""></i>Accounterstellung</h4>
                            <table id="userRegisterTable" class="table table-striped">
                               <tbody>
                                    <tr>
                                       <th style="width: 200px;">${user_name_register}</th>
                                       <td>
                                           <div class="control-group controls">
                                                <input  type="text"
                                                        id="register_username"
                                                        placeholder="${ari_name}"
                                                        minlength="3" data-validation-minlength-message="${register_user_name_too_short}"
                                                        required data-validation-required-message="${register_user_name_required}"/>
                                                <br/>
                                                <div id="register-help-block-username" class="help-block"></div>
                                            </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th>${user_email_register}</th>
                                       <td>
                                            <div class="control-group controls">
                                                <input  type="email"
                                                        id="register_email"
                                                        placeholder="${ari_mail}"
                                                        data-validation-email-message="${mail_format_wrong}"
                                                        required data-validation-required-message="${register_email_required}"/>
                                                <br/>
                                                <div id="register-help-block-email" class="help-block"></div>
                                            </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th>${user_password_register}</th>
                                       <td>
                                            <div class="control-group" id="change_user_password">
                                                  <div class="control-group controls" id="change_user_password_sub">
                                                      <input  type="password"
                                                              id="user_register_password1"
                                                              name="user_register_password1"
                                                              placeholder="${ari_pass}"
                                                              minlength="5" data-validation-minlength-message="${register_password_too_short}"
                                                              required data-validation-required-message="${register_password_required}"/>
                                                      <br/>
                                                      <div class="help-block" id="help-block_register"></div>
                                                  </div>
                                                  <div class="control-group controls" style="clear: both">
                                                      <input  type="password"
                                                              id="user_register_password2"
                                                              name="user_register_password2"
                                                              placeholder="${ari_pass}"
                                                              data-validation-matches-match="user_register_password1"
                                                              data-validation-matches-message="${register_password_dont_match}"/>
                                                      <br/>
                                                      <div class="help-block" id="help-block_register2"></div>
                                                  </div>
                                             </div>
                                       </td>
                                    </tr>
                                    <tr style="display: none;">
                                       <th>${locale}</th>
                                       <td>
                                           <div id="change_user_locale">
                                               <select size="1" id="register_locale_select">
                                                    <option value="deDE">deDE</option>
                                                    <option value="enUS">enUS</option>
                                                </select>
                                           </div>
                                       </td>
                                    </tr>
                               </tbody>
                            </table>
                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-play-circle"></i> ${register}</button>
                            <div style="display: none" id="help-block-user-password-combi-wrong">Registrierung Fehlgeschlagen</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
                        <script>
                            $("#register_user_form input").not("[type=submit]").jqBootstrapValidation(
                            {
                                preventSubmit: true,            
                                submitError: function($form, event, errors) {},
                                submitSuccess: function($form, event){
                                    $.get('./api.php?call=account&action=create&username=' + $('#register_username').val() + '&password_sha=' + $.sha1($('#user_register_password1').val()) + '&email=' + $('#register_email').val() + '&locale=deDE', function (data) {
                                        if(data == 1){
                                            window.location.reload();
                                        } else {
                                            $('#help-block-user-password-combi-wrong').attr('style', 'display: block;');
                                        }                    
                                    });
                                    event.preventDefault();
                                }
                            });
                        </script>
