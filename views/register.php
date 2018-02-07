<form name="userRegistration" id="userRegistration" action="" method="POST">
    <div class="form-group">
        <label for="login">Login</label>
        <input class="form-control" type="text" name="login" id="login" placeholder="Login"><br/>
    </div>
    <div class="form-group">
            <label for="mail">Email address</label>
            <input class="form-control" type="email" name="mail" id="mail" placeholder="E-mail"><br/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Password"><br/>
    </div>
        <input type="hidden" name="mode" value="register">
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg active" name="register_new_user" id="btn" value="Create an account" ><br/>
    </div>
</form>