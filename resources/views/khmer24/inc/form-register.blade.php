<!--Modal Register-->
<div class="modal modal__register fade __clear__border" id="modal-1">
    <div class="modal-dialog __clear__border" role="document">
        <div class="modal-content __clear__border form_register">
            <div class="modal-header form-hf">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center">365daymarket</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('register.post') }}" id="register_" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                                <input type="text" placeholder="Email Address" id="email" name="email"
                                       class="form-control" required>
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" id="password" name="password"
                                       class="form-control">
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword"
                                       class="form-control" required>
                                <span class="text-danger">{{$errors->first('cpassword')}}</span>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-danger  __clear__border" id="__botton__register" type="submit">
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="fb-loginfram">
                            <div class="__or text-center">OR</div>
                            <p class="text-center">Register with Facebook account</p>
                            <div class="__facebook__social">
                                <a href="{{-- {{route('facebook.login')}} --}}" id="fb-register"><i
                                            class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center form-hf">
                <p class="text-center">Already a member? <a href="#" onclick="login__form();" class="alreadyaccount">Sign
                        In</a>
                </p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Modal Login-->
<div class="modal modal__login fade __clear__border" id="modal__login">
    <div class="modal-dialog __clear__border" role="document">
        <div class="modal-content __clear__border form_login">
            <div class="modal-header form-hf">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center">Login to your account</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">Log in with your email address</p>
                    </div>
                </div>
                <form action="{{ route('login.user') }}" id="login_" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                                <input type="text" placeholder="Email Address" name="email"
                                       class="form-control email" required>
                                <span class="text-danger">{{$errors->first('message__error')}}</span>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" name="password"
                                       class="password form-control">
                                <input type="hidden" placeholder="" id="store-id" name="storeID" class="form-control"
                                       value="">
                                <input type="hidden" placeholder="" id="log-save-store" name="getSave"
                                       class="form-control" value="">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-danger btn-loginform __clear__border __botton__register"
                                        type="submit" value="">
                                    Log in
                                </button>
                                <a href="#" onclick="forgotPassword()"> Forget your password?</a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="fb-loginfram">
                            <div class="__or text-center">OR</div>
                            <p class="text-center">Log in with Facebook account</p>
                            <div class="__facebook__social">
                                <a href="{{-- {{route('facebook.login')}} --}}" id="fb-save-store"><i
                                            class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-header sign-upNow form-hf">
                <p class="text-center">New here?<a href="#" class="registeraccount"> Sign up now</a></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal modal__message fade __clear__border" id="modal-1">
    <div class="modal-dialog __clear__border" role="document">
        <div class="modal-content __clear__border form_register">
            <div class="modal-header form-hf">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center"><a href="https://mail.google.com/mail/" title="">Please Confirm Your
                        Email Address</a></h4>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal message_login_error fade __clear__border" id="modal-1">
    <div class="modal-dialog __clear__border" role="document">
        <div class="modal-content __clear__border form_register">
            <div class="modal-header form-hf">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center">Email not approve message</h4>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal modal__message_save fade __clear__border" id="modal-1">
    <div class="modal-dialog __clear__border" role="document">
        <div class="modal-content __clear__border form_register">
            <div class="modal-header form-hf">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center"><a href="#" title="">Your product has been saved!</a></h4>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Modal Forgot Password-->
<div class="modal fade modal_forgot_password " id="modal-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content __clear__border ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Reset Password</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success hidden">
                    <p>Please confirm your email address</p>
                </div>
                <div class="alert alert-danger hidden">
                    <p>Your email address does not exist</p>
                </div>
                <div class="alert alert-danger hidden enterEmail">
                    <p>Please enter your email address</p>
                </div>
                <div class="progress hidden">
                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                        Checking email....
                    </div>
                </div>
                <div class="form-group form_confirm">
                    <input type="email" class="form-control email_reset" placeholder="Enter your email address">
                </div>
            </div>
            <div class="modal-footer form_confirm">
                <button type="button" class="btn btn-secondary __clear__border" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary __clear__border btn_forgot">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--End modal forgot password-->
<div class="modal fade modalResetPassword" id="modal-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content __clear__border">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Reset Password</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="email" readonly class="form-control emailFromGmail"
                           value="@if(!empty($_GET['email'])) {{$_GET['email']}} @endif">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter new password" class="form-control oldPassword">
                    <label for="" class="errorPassword hidden error">Please enter password</label>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Confirm new password" class="form-control newPassword">
                    <label for="" class="error hidden errorNewPassword">Password not matched</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary __clear__border" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary __clear__border bntResetPassword">Reset Password</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- // Show Modal resest password --}}
@if(empty(Auth::check()))
    @if(!empty($reset_password))
        <script type="text/javascript">
            $(".modalResetPassword").modal('show');
            //
            $("body").on('click', '.bntResetPassword', function () {
                var email = $(".emailFromGmail").val();
                var oldPassword = $(".oldPassword").val();
                var newPassword = $(".newPassword").val();
                if (oldPassword == "") {
                    $(".errorPassword ").removeClass('hidden');
                    return;
                } else {
                    $(".errorPassword ").addClass('hidden');
                }
                if (oldPassword != newPassword) {
                    $(".errorNewPassword").removeClass('hidden');
                    return;
                } else {
                    $(".errorNewPassword").addClass('hidden');
                }
                jQuery.ajax({
                    url: "{{route('reset.password')}}",
                    type: "GET",
                    dataType: "json",
                    data: {email: email, oldPassword: oldPassword},
                    success: function (data) {
                        location.reload(true);
                    },
                    complete: function () {
                        location.reload(true);
                    }
                });
            });
        </script>
    @endif
@endif
<script type="text/javascript">
    // 
    $(".btn_forgot").click(function () {
        var email = $(".email_reset").val();
        if (email == "") {
            $(".enterEmail").removeClass('hidden');
        } else {
            $(".enterEmail").addClass('hidden');
            jQuery.ajax({
                url: "{{route('confirm.forgot')}}",
                type: "GET",
                dataType: "json",
                data: {email: email},
                beforeSend: function () {
                    $(".progress").removeClass('hidden');
                },
                success: function (data) {
                    console.log(data)
                    if (data == "1") {
                        $(".modal_forgot_password  .alert-success").removeClass('hidden');
                        $(".modal_forgot_password  .alert-danger").addClass('hidden');
                        $(".form_confirm").addClass('hidden');
                    } else {
                        $(".modal_forgot_password  .alert-success").addClass('hidden');
                        $(".modal_forgot_password  .alert-danger").removeClass('hidden');
                        $(".enterEmail").addClass('hidden');
                    }
                },
                complete: function () {
                    $(".progress").addClass('hidden');
                }
            });
        }
    });
</script>
@if(session()->has('message_login_error'))
    <script>
        $(".message_login_error").modal('show');
    </script>
@endif
@if(session()->has('message'))
    <script>
        $(".modal__message").modal('show');
    </script>
@endif
@if(session()->has('message_save'))
    <script>
        $(".modal__message_save").modal('show');
    </script>
@endif
@if($errors->first('email'))
    <script>
        $(".modal__register").modal('show');
    </script>
@endif
@if ($errors->first('password'))
    <script>
        $(".modal__register").modal('show');
    </script>
@endif
@if ($errors->first('cpassword'))
    <script>
        $(".modal__register").modal('show');
    </script>
@endif
<script>
    $(document).on('click', '.registeraccount', function (e) {
        e.preventDefault();
        $(".modal").modal('hide');
        $(".modal__register").modal('show');
    });

    function forgotPassword() {

        $(".modal").modal('hide');
        $(".modal_forgot_password").modal('show');

    }
    // function register__form() {
    //     $(".modal__register").modal();

    //     var href=$('#fb-register');

    //     var locations=href.attr('href');

    //     var locationss=window.location.href;

    //     // locations=locations.replace('#','');

    //     var page=locationss;

    //     href.attr('href',locations+"?page="+page.replace(/&/g,'||'));

    // }
    function login__form() {
        $(".modal__login").modal("show");
        $(".modal__register").modal('hide');
        var href = $('#fb-save-store');

        var locations = href.attr('href');

        var locationss = window.location.href;

        // locations=locations.replace('#','');

        var page = locationss;

        href.attr('href', locations + "?page=" + page.replace(/&/g, '||'));

    }
    @if($errors->first('message__error'))

      $(".modal__login").modal();

    @endif

    function login__savestore(id=null) {

        $(".modal__login_savestore").modal();

        var href = $('#save-store-lg');

        var getID = $('#store-id');

        var getSAVE = $('#log-save-store');

        var locations = href.attr('href');

        var locationss = window.location;

        locationss = locations.replace('#', '');

        var SaveTo = 'store-save';

        var page = window.location.href;

        getID.attr('value', id);

        getSAVE.attr('value', 'store-save');

        href.attr('href', locations + "?page=" + page.replace(/&/g, '||') + "&storeID=" + id + "&SaveTo=" + SaveTo);

    }

    function login__formSave() {

        $(".modal__loginSave").modal();

        var href = $('#fb-save-list');

        var locations = href.attr('href');

        locations = locations.replace('#', '');

        var page = "store-all-save";

        href.attr('href', locations + "?page=" + page);

    }

    function login__formReview() {

        $(".modal__loginReview").modal();

        var href = $('#fb-login-listreview');

        var locations = href.attr('href');

        locations = locations.replace('#', '');

        var page = "store-list-review";

        href.attr('href', locations + "?page=" + page);

    }

</script>
