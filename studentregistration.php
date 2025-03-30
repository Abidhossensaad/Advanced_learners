 <!--  start student signup form -->
 <form id="stuSignupForm">
          <!-- Name Field -->
          <div class="mb-3">
            <label for="stuname" class="form-label text-secondary">Full Name</label> <small id="statusMsg1"></small>
            <input type="text" 
                   class="form-control rounded-pill" 
                   id="stuname" 
                   name="stuname" 
                   placeholder="Your name" 
                   required>
          </div>
          
          <!-- Email Field -->
          <div class="mb-3">
            <label for="stuemail" class="form-label text-secondary">Email</label> <small id="statusMsg2"></small>
            <input type="email" 
                   class="form-control rounded-pill" 
                   id="stuemail" 
                   name="stuemail" 
                   placeholder="Enter email" 
                   required>
          </div>
          
          <!-- Password Field -->
          <div class="mb-3">
            <label for="stupass" class="form-label text-secondary">Password</label> <small id="statusMsg3"></small>
            <input type="password" 
                   class="form-control rounded-pill" 
                   id="stupass" 
                   name="stupass" 
                   placeholder="Create password" 
                   required
                   minlength="6">
          </div>
          
          <!-- Submit Button -->
           <!-- Success message container (hidden by default) -->
           <div id="signupSuccessMessage"></div>
          <button id="stuSignupBtn"
                  type="button"
                  class="btn w-100 mt-3 rounded-pill"
                  style="background-color: #ff8000; color: white;"
                  onclick="addstu()">
            Sign Up
          </button>
        </form>
        <!--  end student signup form -->