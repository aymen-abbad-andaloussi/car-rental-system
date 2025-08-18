<x-app-layout>
    <div class="">
        <div class="relative " id="Home">
            <img src="{{ asset('storage/images/bg.jpg') }}" alt="bckground" class="w-full">
            <div class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2 text-white flex flex-col gap-3 items-center justify-center bg-black/25 w-[100%] h-[100%]">
                <h1 class="text-5xl capitalize font-bold">Grow your <span class="text-[#F50A0A]">car rental</span> business</h1>
                <h2 class="text-3xl w-[30vw] text-center">Increase efficiency and improve your customer experience with <span class="text-[#F50A0A]">car rental</span></h2>
                <p class="text-lg">Free 7-day trial. No credit card required.</p>
                <a href="#rent" class="px-8 py-2 bg-[#c90707] rounded-full w-fit text-xl font-medium border border-white/20 hover:bg-[#a10505] transition-all cursor-pointer">Rent Now!</a>
            </div>
        </div>
    </div>

    <div class="my-20 flex flex-col items-center">
        <h1 class="text-center text-3xl font-medium text-white mb-10">Get car location services before you visit </h1>
        <div class="flex justify-between w-[70vw]">
            <div class="relative w-fit h-fit cursor-pointer">
                <img src="{{ asset('storage/images/city1.jpg') }}" alt="image" class="rounded-xl ">
                <div class="flex flex-col p-5 absolute bottom-0 left-0 text-white ">
                    <h1 class="font-medium text-xl">Casablanca</h1>
                    <p class="">+250 Cars Available</p>
                </div>
            </div>
            <div class="relative w-fit h-fit cursor-pointer">
                <img src="{{ asset('storage/images/city2.jpg') }}" alt="image" class="rounded-xl ">
                <div class="flex flex-col p-5 absolute bottom-0 left-0 text-white ">
                    <h1 class="font-medium text-xl">Marrakech</h1>
                    <p class="">+190 Cars Available</p>
                </div>
            </div>
            <div class="relative w-fit h-fit cursor-pointer">
                <img src="{{ asset('storage/images/city3.jpg') }}" alt="image" class="rounded-xl ">
                <div class="flex flex-col p-5 absolute bottom-0 left-0 text-white ">
                    <h1 class="font-medium text-xl">Agadir</h1>
                    <p class="">+210 Cars Available</p>
                </div>
            </div>
            <div class="relative w-fit h-fit cursor-pointer">
                <img src="{{ asset('storage/images/city4.jpg') }}" alt="image" class="rounded-xl ">
                <div class="flex flex-col p-5 absolute bottom-0 left-0 text-white ">
                    <h1 class="font-medium text-xl">Tanger</h1>
                    <p class="">+165 Cars Available</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full flex flex-col items-center gap-20 mb-20" id="rent">
        <div class="w-[70vw] ">

            @role('admin|manager')
            <div class="">
                <form action="/home-cars/store" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="flex flex-col gap-4 items-center w-fit">
                        <div class="flex gap-4">
                            <div class="grid grid-rows-3 gap-4">
                                <div class="flex flex-col gap-1.5 w-fit">
                                    <label for="image" class="text-white/90 text-xl font-medium">Add Car Image</label>
                                    <input class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0 py-1.5" type="file" accept="image/*" name="image" id="image">
                                </div>
                                <div class="flex flex-col gap-1.5 w-fit">
                                    <label for="name" class="text-white/90 text-xl font-medium">Add Name Of Car</label>
                                    <input class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0" type="text" name="name" id="name" >
                                </div>
                                <div class="flex flex-col gap-1.5 w-fit">
                                    <label for="marque" class="text-white/90 text-xl font-medium">Add Mark Of Car</label>
                                    <input class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0" type="text" name="marque" id="marque" >
                                </div>
                            </div>
                            <div class="grid grid-rows-3 gap-4">
                                <div class="flex flex-col gap-1.5 w-fit">
                                    <label for="price" class="text-white/90 text-xl font-medium">Add Price Of Car</label>
                                    <input class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0" type="number" name="price" id="price" >
                                </div>
                                <div class="flex flex-col gap-1.5 w-fit">
                                    <label for="city" class="text-white/90 text-xl font-medium">Add City Of Car</label>
                                    {{-- <input class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0" type="text" name="city" id="city" > --}}
                                    <select class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0" name="city" id="city">
                                        <option class="bg-black/50" value="Casablanca">Casablanca</option>
                                        <option class="bg-black/50" value="Marakech">Marakech</option>
                                        <option class="bg-black/50" value="Agadir">Agadir</option>
                                        <option class="bg-black/50" value="Tanger">Tanger</option>
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1.5 w-fit">
                                    <label for="description" class="text-white/90 text-xl font-medium">Add Description Of Car</label>
                                    <input class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0" type="text" name="description" id="description" >
                                </div>
                            </div>
                        </div>
                        <button class="w-[20vw] py-2 rounded-lg bg-[#F50A0A] text-white/80 font-bold text-xl">Add</button>
                    </div>

                </form>
            </div>
            @endrole

            <div class="">
                @foreach ($cars as $car)
                    <div class="">
                        <img src="{{ asset('storage/' . $car->image ) }}" alt="image" class="w-[300px] ">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w-[70vw] flex flex-col gap-8">
            <h1 class="text-3xl font-medium text-white/90">Why <span class="text-[#F50A0A]">Car Rental</span> is the #1 Automotive Marketplace</h1>
            <div class="gap-10 grid grid-cols-3 w-full justify-center ">
                <div class="flex flex-col items-center justify-center gap-3 w-[20vw] border border-white/30 rounded-lg p-3 hover:bg-white/15 cursor-pointer transition-all">
                    <div class="w-full h-[85%]"><img src="{{ asset('storage/images/why-1.jpg') }}" alt="" class="w-full h-[100%]"></div>
                    <div class="h-[15%] flex items-center">
                        <h1 class="text-2xl text-center font-medium text-white/90">Top-Quality Cars</h1>
                    </div>
                </div>
                
                <div class="flex flex-col items-center justify-center gap-3 w-[20vw] border border-white/30 rounded-lg p-3 hover:bg-white/15 cursor-pointer transition-all">
                    <div class="w-full h-[85%]"><img src="{{ asset('storage/images/why-2.jpg') }}" alt="" class="w-full h-[100%]"></div>
                    <div class="h-[15%] flex items-center">
                        <h1 class="text-2xl text-center font-medium text-white/90">Excellent Service &<br>Customer Care</h1>
                    </div>
                </div>
                
                <div class="flex flex-col items-center justify-center gap-3 w-[20vw] border border-white/30 rounded-lg p-3 hover:bg-white/15 cursor-pointer transition-all">
                    <div class="w-full h-[85%]"><img src="{{ asset('storage/images/why-3.jpg') }}" alt="" class="w-full h-[100%]"></div>
                    <div class="h-[15%] flex items-center">
                        <h1 class="text-2xl text-center font-medium text-white/90">We Deliver Cars to Your Location</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-[70vw] text-white/90">
            <h1 class="text-3xl font-medium">Renting a car in Morocco is now easier</h1>
            <div class="flex mt-5 items-center">
                <div class="w-[60%] flex flex-col gap-5">
                    <p class="w-[95%] text-xl">
                        Morocco is a charming country in North Africa and welcomes many visitors every year. Bordered by the Atlantic Ocean and the Mediterranean Sea, the Sahara Desert, beaches, architecture, and culture make it a popular destination for tourists. Car rental is the best way to explore many places in less time and at your convenience. Make the most of your time in Morocco by choosing a car rental that allows you to travel at your own pace and convenience. Also, check the car rental insurance options for a hassle-free experience.
                    </p>
                    <p class="w-[95%] text-xl">
                        When looking for a car rental in Morocco, there are many car rental options and rental services, but OneClickDrive is the best car rental company in Morocco. With our platform, you can be sure to receive the best service according to your choice and good value for money. Browse over 100 suppliers in Morocco with a wide range of rental cars from reputable companies in numerous car rental locations.
                    </p>
                </div>
                <div class="w-[35%]"><img src="{{ asset('storage/images/morocco.webp') }}" alt="morocco" class=""></div>
            </div>
        </div>

    </div>

    @include('footer')
</x-app-layout>