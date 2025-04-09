<form id="stuLoginForm">
    <div class="mb-3">
        <label for="stuLogemail" class="form-label text-secondary">Email</label>
        <input type="email" class="form-control rounded-pill" placeholder="Enter email" required id="stuLogemail" name="stuLogemail">
    </div>

    <div class="mb-3">
        <label for="stuLogpass" class="form-label text-secondary">Password</label>
        <input type="password" class="form-control rounded-pill" placeholder="Enter password" required id="stuLogpass" name="stuLogpass">
    </div>

    <div class="mb-3 text-end">
        <a href="#" class="text-decoration-none" style="color: #ff8000;">Forgot password?</a>
    </div>

    <div class="modal-footer">
        <div id="statusLogMsg" class="mb-3"></div>
        <button id="stuLoginBtn" type="button" class="btn w-100 rounded-pill"
            style="background-color: #ff8000; color: white;" onclick="CheckStuLogin()">
            Login
        </button>
    </div>
</form>
