<?php
$this->load->view('layout/header');
$this->load->view('layout/sidebar');
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Forms</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Forms</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Inputs</div>
                <div class="panel-body">
                    <form class="form-horizontal row-border" action="#">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Default input field</label>
                            <div class="col-md-10">
                                <input type="text" name="regular" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="pass">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">With placeholder</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="placeholder" placeholder="placeholder">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Disabled field</label>
                            <div class="col-md-10">
                                <input type="text" name="disabled" disabled="disabled" value="disabled"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Read only field</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="readonly" readonly="" value="read only">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Help text</label>
                            <div class="col-md-10">
                                <input type="text" name="regular" class="form-control"><span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Predefined value</label>
                            <div class="col-md-10">
                                <input type="text" name="regular" value="http://" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Column sizing</label>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" placeholder=".col-xs-3">
                                    </div>
                                    <div class="col-xs-5">
                                        <input type="text" class="form-control" placeholder=".col-xs-5">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" placeholder=".col-xs-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="col-md-2 control-label">Input success</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="inputSuccess" placeholder="Input Success"><i
                                        class="icon-pencil input-icon success"></i></div>
                        </div>
                        <div class="form-group has-warning">
                            <label class="col-md-2 control-label">Input warning</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="inputWarning" placeholder="Input Warning"><i
                                        class="icon-pencil input-icon warning"></i></div>
                        </div>
                        <div class="form-group has-error">
                            <label class="col-md-2 control-label">Input error</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="inputError" placeholder="Input Error"><i
                                        class="icon-pencil input-icon error"></i></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Input Groups</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <div class="input-group"><span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control"><span class="input-group-addon">.00</span></div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="input-group"><span class="input-group-addon">$</span>
                                <input type="text" class="form-control"><span class="input-group-addon">.00</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Button Addons</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-sx-6">
                            <div class="input-group"><span class="input-group-btn">
										<button class="btn btn-default" type="button" title="">Go!</button>
										</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-sx-6">
                            <div class="input-group">
                                <input type="text" class="form-control"><span class="input-group-btn">
											<button class="btn btn-default" type="button" data-original-title=""
                                                    title="">Submit!</button>
									</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Check boxes</div>
                <div class="panel-body">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="option1" checked="">1
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="option2">2
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="option3" disabled="">3
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Radio buttons</div>
                <div class="panel-body">
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">1
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option2" disabled="">3
                    </label>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Check Boxes &amp; Radio Addons</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="input-group"><span class="input-group-addon">
										<input type="checkbox">
										</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="input-group"><span class="input-group-addon">
										<input type="checkbox" checked="">
										</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="input-group"><span class="input-group-addon">
										<input type="radio" name="optionsRadio" id="optionsRadiosX" value="optionx">
										</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="input-group"><span class="input-group-addon">
										<input type="radio" name="optionsRadio" id="optionsRadiosY" value="optiony"
                                               checked="">
										</span>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Inline Form</div>
                <div class="panel-body">
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                   placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" title="">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Input Sizing</div>
                <div class="panel-body">
                    <div class="input-group input-group-lg"><span class="input-group-addon">@</span>
                        <input type="text" class="form-control input-lg" placeholder="Username">
                    </div>
                    <br>
                    <div class="input-group"><span class="input-group-addon">$</span>
                        <input type="text" class="form-control" placeholder="Currency">
                    </div>
                    <br>
                    <div class="input-group input-group-sm"><span class="input-group-addon">{}</span>
                        <input type="text" class="form-control" placeholder="Code">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Height Sizing</div>
                <div class="panel-body">
                    <select class="form-control input-lg">
                        <option value="">.input-lg</option>
                    </select>
                    <br>
                    <select class="form-control">
                        <option value="">Default select</option>
                    </select>
                    <br>
                    <select class="form-control input-sm">
                        <option value="">.input-sm</option>
                    </select>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <?php
    $this->load->view('layout/footer');
    ?>
