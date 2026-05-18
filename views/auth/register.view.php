<?php LoadPartial('head'); ?>
<?php LoadPartial('navbar'); ?>

<div class="flex justify-center items-center mt-14">
      <div class="bg-white p-6 rounded-lg shadow-md w-full md:w-500 mx-5">
        <h2 class="text-4xl text-center font-bold mb-3">Register</h2>
        <!-- <div class="message bg-red-100 p-3 my-3">This is an error message.</div>
        <div class="message bg-green-100 p-3 my-3">
          This is a success message.
        </div> -->
        <form>
          <div class="mb-3">
            <input
              type="text"
              name="name"
              placeholder="Full Name"
              class="w-full px-3 py-2 border rounded focus:outline-none"
            />
          </div>
          <div class="mb-3">
            <input
              type="email"
              name="email"
              placeholder="Email Address"
              class="w-full px-3 py-2 border rounded focus:outline-none"
            />
          </div>
           <div class="mb-3">
            <input
              type="text"
              name="city"
              placeholder="City"
              class="w-full px-3 py-2 border rounded focus:outline-none"
            />
          </div>
           <div class="mb-3">
            <input
              type="text"
              name="state"
              placeholder="State"
              class="w-full px-3 py-2 border rounded focus:outline-none"
            />
          </div>
          <div class="mb-3">
            <input
              type="password"
              name="password"
              placeholder="Password"
              class="w-full px-3 py-2 border rounded focus:outline-none"
            />
          </div>
          <div class="mb-3">
            <input
              type="password"
              name="password_confirmation"
              placeholder="Confirm Password"
              class="w-full px-3 py-2 border rounded focus:outline-none"
            />
          </div>
          <button
            type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none"
          >
            Register
          </button>

          <p class="mt-3 text-gray-500">
            Already have an account?
            <a class="text-blue-900" href="login.html">Login</a>
          </p>
        </form>
      </div>
    </div>

<?php LoadPartial('footer'); ?>
