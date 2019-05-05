<template>
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="register.post" class="form-register" method="post">
                        <div class="form-group">
                            <label for="email_login">Email address</label>
                            <input type="email" name="email" class="form-control" id="email_login"
                                   aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="lb-email" class="form-text text-muted text-danger d-none">
                                The field email is required
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="password_login">Password</label>
                            <input type="password" name="password" class="form-control" id="password_login"
                                   placeholder="Password" required>
                            <small id="lbl-password" class="form-text text-muted text-danger d-none">
                                The field password is required
                            </small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary xs register" v-on:click="login">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{

            }
        },
        methods: {
            login: function () {
                var email = $("#email_login").val();
                var password = $("#password_login").val();
                var success = true;
                if (email == "") {
                    $("#lb-email").removeClass('d-none');
                    success = false;
                } else {
                    $("#lb-email").addClass('d-none');
                    success = true;
                }
                if (password == "") {
                    success = false;
                    $("#lbl-password").removeClass('d-none');
                } else {
                    success = true;
                    $("#lbl-password").addClass('d-none');
                }

                if(success!==false){
                    $(".form-register").submit();
                }
            }
        }
    }
</script>