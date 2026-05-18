<!-- Showcase -->
    <section
      class="showcase relative bg-cover bg-center bg-no-repeat h-72 flex items-center"
    >
      <div class="overlay"></div>
      <div class="container mx-auto px-4 text-center z-10">
        <div class="showcase-panel">
          <h2 class="text-4xl text-white font-bold mb-3">Find Your Dream Job</h2>
          <p class="showcase-copy text-lg">
            Browse curated roles, filter quickly, and focus on opportunities that fit your goals.
          </p>
          <form method="GET" action="/listings/search" class="mb-0 mx-5 md:mx-auto">
            <input
              type="text"
              name="keywords"
              placeholder="Keywords"
              class="w-full md:w-auto px-3 py-2 border focus:outline-none rounded-lg box-shadow-md"
            />
            <input
              type="text"
              name="location"
              placeholder="Location"
              class="w-full md:w-auto px-3 py-2 border focus:outline-none rounded-lg box-shadow-md"
            />
            <button
              class="w-full md:w-auto bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 focus:outline-none"
            >
            <i class="fa fa-search"></i> Search
            </button>
          </form>
        </div>
      </div>
    </section>
