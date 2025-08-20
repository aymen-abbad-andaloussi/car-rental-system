<x-app-layout>
    <div class="">
        <div class="relative " id="Home">
            <img src="{{ asset('storage/images/bg.jpg') }}" alt="bckground" class="w-full">
            <div
                class="absolute left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2 text-white flex flex-col gap-3 items-center justify-center bg-black/25 w-[100%] h-[100%]">
                <h1 class="text-5xl capitalize font-bold">Grow your <span class="text-[#F50A0A]">car rental</span>
                    business</h1>
                <h2 class="text-3xl w-[30vw] text-center">Increase efficiency and improve your customer experience with
                    <span class="text-[#F50A0A]">car rental</span></h2>
                <p class="text-lg">Free 7-day trial. No credit card required.</p>
                <a href="#rent"
                    class="px-8 py-2 bg-[#c90707] rounded-full w-fit text-xl font-medium border border-white/20 hover:bg-[#a10505] transition-all cursor-pointer">Rent
                    Now!</a>
            </div>
        </div>
    </div>
{{-- cities --}}
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

{{-- filter --}}
            <div class="flex justify-between">
                <div class="w-fit">
                    <form action="/home-cars" method="post">
                        @csrf

                        <div class="flex items-center gap-5">
                            <select name="filter_mark" class="cursor-pointer hover:bg-black/10 w-[10vw] text-lg font-medium outline-0 text-white/90 rounded-lg bg-white/5">
                                <option class="bg-black/70 text-white/90 outline-0 text-base font-medium" value="all" selected >Select Mark</option>
                                @foreach ($cars->pluck('marque')->unique() as $marque)
                                    <option class="bg-black/70 text-white/90 outline-0 text-base font-medium"
                                            value="{{ $marque }}">
                                        {{ $marque }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="filter_model" class="cursor-pointer hover:bg-black/10 w-[10vw] text-lg font-medium outline-0 text-white/90 rounded-lg bg-white/5">
                                <option class="bg-black/70 text-white/90 outline-0 text-base font-medium" value="all" selected >Select Model</option>
                                @foreach ($cars->pluck('model')->unique() as $model)
                                    <option class="bg-black/70 text-white/90 outline-0 text-base font-medium"
                                            value="{{ $model }}">
                                        {{ $model }}
                                    </option>
                                @endforeach
                            </select>
                            
                            <select name="filter_city" class="cursor-pointer hover:bg-black/10 w-[10vw] text-lg font-medium outline-0 text-white/90 rounded-lg bg-white/5">
                                <option class="bg-black/70 text-white/90 outline-0 text-base font-medium" value="all" selected >Select City</option>
                                @foreach ($cars->pluck('city')->unique() as $city)
                                    <option class="bg-black/70 text-white/90 outline-0 text-base font-medium"
                                            value="{{ $city }}">
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="filter_price" class="cursor-pointer hover:bg-black/10 w-[10vw] text-lg font-medium outline-0 text-white/90 rounded-lg bg-white/5">
                                <option class="bg-black/70 text-white/90 outline-0 text-base font-medium" value="all" selected>Select Price</option>
                                <option class="bg-black/70 text-white/90 outline-0 text-base font-medium" value="less_500">Less Than 500</option>
                                <option class="bg-black/70 text-white/90 outline-0 text-base font-medium" value="more_500">More Than 500</option>
                            </select>

                            <button class="px-10 py-2 bg-[#F50A0A] rounded-lg text-white text-xl font-medium cursor-pointer hover:bg-red-700" >Filter</button>                            

                        </div>
                    </form>
                </div>
                
                @role('manager')
                <button
                class="px-10 py-1.5 bg-[#F50A0A] rounded-lg text-white text-xl font-medium cursor-pointer hover:bg-red-700"
                id="buttonForm">Add Cars</button>
                @endrole
            </div>
            
{{-- add cars --}}
            @role('manager')
                <div id="cardForm" class="hidden my-10 border w-fit p-10 border-white/30 bg-[#303030] rounded-xl fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
                    <form action="/home-cars/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-col gap-4 items-center w-fit">
                            <div class="flex gap-4">
                                <div class="grid grid-rows-3 gap-4">
                                    <div class="flex flex-col gap-1.5 w-fit">
                                        <label for="image" class="text-white/90 text-xl font-medium">Add Car
                                            Image</label>
                                        <input
                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0 py-1.5"
                                            type="file" accept="image/*" name="image" id="image">
                                    </div>
                                    <div class="flex flex-col gap-1.5 w-fit">
                                        <label for="name" class="text-white/90 text-xl font-medium">Add Name Of
                                            Car</label>
                                        <input
                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                            type="text" name="name" id="name">
                                    </div>
                                    <div class="flex flex-col gap-1.5 w-fit">
                                        <label for="marque" class="text-white/90 text-xl font-medium">Add Mark Of
                                            Car</label>
                                        <input
                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                            type="text" name="marque" id="marque">
                                    </div>
                                </div>
                                <div class="grid grid-rows-3 gap-4">
                                    <div class="flex flex-col gap-1.5 w-fit">
                                        <label for="model" class="text-white/90 text-xl font-medium">Add Model
                                            Of Car</label>
                                        <input
                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                            type="number" name="model" id="model">
                                    </div>
                                    <div class="flex flex-col gap-1.5 w-fit">
                                        <label for="city" class="text-white/90 text-xl font-medium">Add City Of
                                            Car</label>
                                            <select
                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                            name="city" id="city">
                                            <option class="bg-black/50" value="Casablanca">Casablanca</option>
                                            <option class="bg-black/50" value="Marakech">Marakech</option>
                                            <option class="bg-black/50" value="Agadir">Agadir</option>
                                            <option class="bg-black/50" value="Tanger">Tanger</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col gap-1.5 w-fit">
                                        <label for="price" class="text-white/90 text-xl font-medium">Add Price Of
                                            Car</label>
                                        <input
                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                            type="number" name="price" id="price">
                                    </div>
                                </div>
                            </div>
                            <button
                                class="w-[20vw] py-2 rounded-lg bg-[#F50A0A] text-white/80 font-bold text-xl">Add</button>
                        </div>

                    </form>
                </div>
            @endrole

{{-- edite & update --}}
            <div class="mt-10">
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($cars as $car)
                        <div class="flex flex-col gap-2 p-3 border h-[380px] hover:bg-white/5 cursor-pointer transition-all border-white/20 rounded-lg relative">
                            @role('manager')
                            <div class="absolute top-2 left-4 flex gap-2 items-center" data-post-id="{{ $car->id }}">
                                <form action="/home-cars/destroy{{ $car->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-fit mt-2 hover:bg-[#F50A0A] rounded-full transition-all text-white"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg></button>
                                </form>
                                <button class="btnEdite w-fit hover:bg-[#F50A0A] rounded-md transition-all text-white"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg></button>
                            </div>
                            @endrole

                            @role('manager')
                            {{-- Update --}}
                            <div class="divEdite hidden z-10 my-10 border w-fit p-10 border-white/30 bg-[#303030] rounded-xl fixed left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2" data-post-id="{{ $car->id }}">
                                <div class="w-fit relative">
                                    <form action="/home-cars/update{{ $car->id }}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        @method('PUT')
                    
                                        <div class="flex flex-col gap-4 items-center w-fit">
                                            <div class="flex gap-4">
                                                <div class="grid grid-rows-3 gap-4">
                                                    <div class="flex flex-col gap-1.5 w-fit">
                                                        <label for="image" class="text-white/90 text-xl font-medium">Add Car
                                                            Image</label>
                                                        <input
                                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0 py-1.5"
                                                            type="file" accept="image/*" name="image" id="image">
                                                    </div>
                                                    <div class="flex flex-col gap-1.5 w-fit">
                                                        <label for="name" class="text-white/90 text-xl font-medium">Add Name Of
                                                            Car</label>
                                                        <input
                                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                                            type="text" name="name" id="name">
                                                    </div>
                                                    <div class="flex flex-col gap-1.5 w-fit">
                                                        <label for="marque" class="text-white/90 text-xl font-medium">Add Mark Of
                                                            Car</label>
                                                        <input
                                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                                            type="text" name="marque" id="marque">
                                                    </div>
                                                </div>
                                                <div class="grid grid-rows-3 gap-4">
                                                    <div class="flex flex-col gap-1.5 w-fit">
                                                        <label for="model" class="text-white/90 text-xl font-medium">Add Model
                                                            Of Car</label>
                                                        <input
                                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                                            type="number" name="model" id="model">
                                                    </div>
                                                    <div class="flex flex-col gap-1.5 w-fit">
                                                        <label for="city" class="text-white/90 text-xl font-medium">Add City Of
                                                            Car</label>
                                                            <select
                                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                                            name="city" id="city">
                                                            <option class="bg-black/50" value="Casablanca">Casablanca</option>
                                                            <option class="bg-black/50" value="Marakech">Marakech</option>
                                                            <option class="bg-black/50" value="Agadir">Agadir</option>
                                                            <option class="bg-black/50" value="Tanger">Tanger</option>
                                                        </select>
                                                    </div>
                                                    <div class="flex flex-col gap-1.5 w-fit">
                                                        <label for="price" class="text-white/90 text-xl font-medium">Add Price Of
                                                            Car</label>
                                                        <input
                                                            class="bg-white/15 rounded-lg text-white text-lg w-[20vw] px-3 border-0 outline-0"
                                                            type="number" name="price" id="price">
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="flex justify-start w-full">
                                                <button
                                                class="w-[20vw] py-2 rounded-lg bg-[#F50A0A] text-white/80 font-bold text-xl">Add</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    <button
                                    class="cancelButtonEd w-[20vw] py-2 rounded-lg bg-white/10 border border-white/30 text-white/80 font-bold text-xl absolute bottom-0 right-0" >Cancel</button>
                                </div>
                            </div>
                            {{-- end Update --}}
                            @endrole

                            <img src="{{ asset('storage/' . $car->image) }}" alt="image" class="w-full h-[45%]">
                            <div class="text-white/90 flex flex-col relative">
                                <h1 class="text-2xl capitalize text-neutral-300 font-bold pb-1">{{ $car->name }}
                                </h1>
                                <h1 class="text-lg ">Mark : <span class="uppercase">{{ $car->marque }}</span></h1>
                                <h1 class="font-medium">Model : {{ $car->model }}</h1>
                                <h1 class=" font-medium">City : {{ $car->city }}</h1>
                                <h1 class="text-xl flex items-center gap-1">Price : <span
                                    class="text-green-700 font-bold">{{ $car->price }} DH</span><span
                                    class="text-sm font-light text-white/80">/day</span></h1>
                                </div>
                                <button class="buttonBooking px-10 py-1.5 bg-[#F50A0A] text-center rounded-lg text-white text-xl font-medium cursor-pointer hover:bg-red-700">Rent
                                Car</button>

                                <div class="divBooking hidden absolute left-1 top-1 border border-white/20 rounded-lg bg-[#363636] w-[16.3vw] h-[30vh] p-3">
                                    <div class="flex flex-col justify-evenly gap-3 w-full h-[100%]">
                                        <div class="flex flex-col gap-2">
                                            <label for="from" class="text-white/90 text-lg">Start Booking :</label>
                                            <input class="text-white/90 bg-white/20 rounded-lg" type="date" id="from">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <label for="to" class="text-white/90 text-lg">End Booking :</label>
                                            <input class="text-white/90 bg-white/20 rounded-lg" type="date" id="to">
                                        </div>
                                        <a href="/home-cars/pay-with-stripe"
                                        class="px-10 py-1.5 bg-[#F50A0A] text-center rounded-lg text-white text-xl font-medium cursor-pointer hover:bg-red-700">Rent
                                        Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $cars->links() }}
                        </div>
                    </div>
                </div>
                
        <div class="w-[70vw] flex flex-col gap-8">
            <h1 class="text-3xl font-medium text-white/90">Why <span class="text-[#F50A0A]">Car Rental</span> is the
                #1 Automotive Marketplace</h1>
            <div class="gap-10 grid grid-cols-3 w-full justify-center ">
                <div
                    class="flex flex-col items-center justify-center gap-3 w-[20vw] border border-white/30 rounded-lg p-3 hover:bg-white/15 cursor-pointer transition-all">
                    <div class="w-full h-[85%]"><img src="{{ asset('storage/images/why-1.jpg') }}" alt=""
                            class="w-full h-[100%]"></div>
                    <div class="h-[15%] flex items-center">
                        <h1 class="text-2xl text-center font-medium text-white/90">Top-Quality Cars</h1>
                    </div>
                </div>

                <div
                    class="flex flex-col items-center justify-center gap-3 w-[20vw] border border-white/30 rounded-lg p-3 hover:bg-white/15 cursor-pointer transition-all">
                    <div class="w-full h-[85%]"><img src="{{ asset('storage/images/why-2.jpg') }}" alt=""
                            class="w-full h-[100%]"></div>
                    <div class="h-[15%] flex items-center">
                        <h1 class="text-2xl text-center font-medium text-white/90">Excellent Service &<br>Customer Care
                        </h1>
                    </div>
                </div>

                <div
                    class="flex flex-col items-center justify-center gap-3 w-[20vw] border border-white/30 rounded-lg p-3 hover:bg-white/15 cursor-pointer transition-all">
                    <div class="w-full h-[85%]"><img src="{{ asset('storage/images/why-3.jpg') }}" alt=""
                            class="w-full h-[100%]"></div>
                    <div class="h-[15%] flex items-center">
                        <h1 class="text-2xl text-center font-medium text-white/90">We Deliver Cars to Your Location
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-[70vw] text-white/90">
            <h1 class="text-3xl font-medium">Renting a car in Morocco is now easier</h1>
            <div class="flex mt-5 items-center">
                <div class="w-[60%] flex flex-col gap-5">
                    <p class="w-[95%] text-xl">
                        Morocco is a charming country in North Africa and welcomes many visitors every year. Bordered by
                        the Atlantic Ocean and the Mediterranean Sea, the Sahara Desert, beaches, architecture, and
                        culture make it a popular destination for tourists. Car rental is the best way to explore many
                        places in less time and at your convenience. Make the most of your time in Morocco by choosing a
                        car rental that allows you to travel at your own pace and convenience. Also, check the car
                        rental insurance options for a hassle-free experience.
                    </p>
                    <p class="w-[95%] text-xl">
                        When looking for a car rental in Morocco, there are many car rental options and rental services,
                        but OneClickDrive is the best car rental company in Morocco. With our platform, you can be sure
                        to receive the best service according to your choice and good value for money. Browse over 100
                        suppliers in Morocco with a wide range of rental cars from reputable companies in numerous car
                        rental locations.
                    </p>
                </div>
                <div class="w-[35%]"><img src="{{ asset('storage/images/morocco.webp') }}" alt="morocco"
                        class=""></div>
            </div>
        </div>

    </div>

    @include('footer')
</x-app-layout>
