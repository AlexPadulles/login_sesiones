
<div class="container mx-auto mt-10 mb-14  bg-green-200 hover:border-2 border-cyan-700 h-0 hover:h-max">  
<section class=" ">
  <div class="px-6 text-gray-800">
    
    <div
      class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap g-6"
    >
    
      <div
        class="grow-0 h-3/4 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12"
      >
    
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="w-full"
          alt="Sample image"
        />
      </div>
      <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 h-3/4 mb-12 md:mb-0">
        <form  action="resources/controllers/login.php" method="POST">
          <!-- Nombre -->
          <div class="mb-6">
            <input
              type="text"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              name="nombre"
              placeholder="Nombre de usuario"
            />
          </div>

          <!-- Password input -->
          <div class="mb-6">
            <input
              type="password"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              name="contraseña"
              placeholder="Password"
            />
          </div>
          <div class="text-center lg:text-left">
            <button
              type="submit"
              class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
              Login
            </button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
   
  </div>    
  </div>
</section>