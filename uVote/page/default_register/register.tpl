    <div class="panel-group" id="accordion" style="padding-right: 30px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Welcome
                </h4>
            </div>                        
            <div class="panel-body">
                <img src="${frontend_logos}logo2.png" width="450"/>
                <img src="${frontend_logos}cover.png" width="450"/>
                </br></br>
                ${welcome_text}
            </div>            
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_gallery">Gallery</a>
                </h4>
            </div>
            <div id="collapse_gallery" class="panel-collapse collapse">
                <div class="panel-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"  style="width: 50%; float: left;">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                          <div class="item active">
                            <img src="..." alt="...">
                            <div class="carousel-caption">
                              ...
                            </div>
                          </div>
                          ...
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                    <div id="graph_bt_uv_overall" style="float: left; width: 300px;"></div>
                    <script type="text/javascript" language="JavaScript">load_visualisation('graph_bt_uv_overall',84600);</script>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_register">Registrieren</a>
                </h4>
            </div>
            <div id="collapse_register" class="panel-collapse collapse">
                <div class="panel-body">
                    <form class="textbox" id="register_user_form">
                        <div class="control-group" id="register_username_control_group">
                            <table id="userRegisterTable" class="table table-striped">
                               <tbody>
                                    <tr>
                                       <th style="width: 200px;">${user_name_register}</th>
                                       <td>
                                           <div class="control-group controls">
                                                <input  type="text"
                                                        size="30"
                                                        style="margin-bottom: 15px; float: left;"
                                                        id="register_username"
                                                        placeholder="${ari_name}"
                                                        minlength="3" data-validation-minlength-message="${register_user_name_too_short}"
                                                        required data-validation-required-message="${register_user_name_required}"/>
                                                <br/>
                                                <div id="register-help-block-username" class="help-block" style="float: left; margin-top: 3px;"></div>
                                            </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th>${user_email_register}</th>
                                       <td>
                                            <div class="control-group controls">
                                                <input  type="email"
                                                        size="30"
                                                        style="margin-bottom: 15px; float: left;"
                                                        id="register_email"
                                                        placeholder="${ari_mail}"
                                                        data-validation-email-message="${mail_format_wrong}"
                                                        required data-validation-required-message="${register_email_required}"/>
                                                <br/>
                                                <div id="register-help-block-email" class="help-block" style="float: left; margin-top: 3px;"></div>
                                            </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th>${user_password_register}</th>
                                       <td>
                                            <div class="control-group" id="change_user_password">
                                                  <div class="control-group controls" style="clear: both">
                                                      <input  type="password"
                                                              size="30"
                                                              style="margin-bottom: 15px; float: left;"
                                                              id="user_register_password1"
                                                              name="user_register_password1"
                                                              placeholder="${ari_pass}"
                                                              minlength="5" data-validation-minlength-message="${register_password_too_short}"
                                                              required data-validation-required-message="${register_password_required}"/>
                                                      <br/>
                                                      <div class="help-block" style="float: left; margin-top: 3px;"></div>
                                                  </div>
                                                  <div class="control-group controls" style="clear: both">
                                                      <input  type="password"
                                                              size="30"
                                                              style="margin-bottom: 15px; float: left;"
                                                              id="user_register_password2"
                                                              name="user_register_password2"
                                                              placeholder="${ari_pass}"
                                                              data-validation-matches-match="user_register_password1"
                                                              data-validation-matches-message="${register_password_dont_match}"/>
                                                      <br/>
                                                      <div class="help-block" style="float: left; margin-top: 3px;"></div>
                                                  </div>
                                             </div>
                                       </td>
                                    </tr>
                                    <tr>
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
                            <button class="btn btn-primary" type="submit"><i class="icon-ok icon-white"></i> ${register}</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>