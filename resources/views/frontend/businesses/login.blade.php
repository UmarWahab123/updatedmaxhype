<form action="{{url('/userlog')}}" id="form_submit" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-title">
                <h2>Logged in</h2>
                <p>Register if you don't have an account.</p>
            </div>
        </div>
        <div class="form-group col-lg-12">
            <label>Email</label>
            <input type="email" name="email" class="form-control" id="Name1" placeholder="Enter username or email id" required>
        </div>
        <div class="form-group col-lg-12">
            <label>Password</label>
            <input type="password" name="password" class="form-control" id="email1" placeholder="Enter correct password" required>
        </div>
        <div class="col-lg-12">
            <div class="comment-btn">
                <button type="submit" class="btn-blue btn-red">Login</button>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="login-accounts">
                <a href="{{url('/forget_password')}}" class="forgotpw">Forgot Password ?</a>
            </div>
        </div>
    </div>
</form>