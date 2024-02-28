<form class="w-4/5 max-w-[795px]" action="/">
    <div class="relative flex flex-col md:flex-row items-center px-2 rounded-lg overflow-hidden md:bg-white md:border-2 border-font-color-dark dark:border-gray-500 m-4 rounded-[10px]">
        <div class="relative flex items-center w-full bg-white md:bg-none rounded-t-lg overflow-hidden md:border-none border-t-2 border-l-2 border-r-2 border-font-color-dark dark:border-gray-500">
            <div class="ml-4 md:ml-2 mr-4">
                <i
                    class="fa fa-search text-font-color-primary z-20 hover:text-gray-500"
                ></i>
            </div>
            <input
                type="text"
                name="search"
                class="h-14 w-full pr-10 text-font-color-primary z-0 outline-none"
                placeholder="Search jobs..."
                value="{{ request('search') }}"
                autocomplete="off"
            />
            <div class="absolute md:hidden bottom-0 left-0 w-full h-[1px] bg-font-color-dark dark:bg-gray-200"></div>
        </div>

        <div class="hidden md:block w-[1px] h-[30px] mx-6 bg-gray-200"></div>
        <div class="flex items-center w-full bg-white md:bg-none rounded-b-lg overflow-hidden md:border-none border-b-2 border-l-2 border-r-2 border-font-color-dark dark:border-gray-500">
            <div class="ml-4 md:ml-2 mr-4">
                <i
                    class="fa fa-location-dot text-font-color-primary z-20 hover:text-gray-500 w-[16px]"
                ></i>
            </div>
            <input
                type="text"
                name="location"
                class="h-14 w-full pr-10 text-font-color-primary z-0 outline-none"
                placeholder="Location"
                value="{{ request('location') }}"
                autocomplete="off"
            />
        </div>
        <button
            type="submit"
            class="h-[45px] md:h-10 w-full mt-4 md:mt-0 md:w-52 text-white rounded-lg bg-primary md:dark:hover:bg-dark md:dark:hover:text-font-color-dark hover:bg-font-color-primary dark:hover:bg-font-color-dark dark:hover:text-font-color-primary text-lg md:text-[16px]"
        >
            Find Jobs
        </button>
    </div>
</form>