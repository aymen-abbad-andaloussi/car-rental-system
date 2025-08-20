<x-app-layout>
    <div class="w-full h-[80vh] flex flex-col justify-center items-center">
        <div class=" border border-white/40 rounded-[30px] flex flex-col gap-5 p-5 w-[40vw] max-sm:w-[90vw]">
            <div class="w-full flex flex-col gap-1.5">
                <label class="float-left font-semibold text-white text-xl pl-3 italic">
                    Name:
                </label>
                <input type="text" name="name" class="bg-white/10 text-white/90 py-2 px-5 text-xl rounded-full outline-0"
                    placeholder="Enter Your Name" />
            </div>
            <div class="w-full flex flex-col gap-1.5">
                <label class="float-left font-semibold text-white text-xl pl-3 italic">
                    Email:
                </label>
                <input type="email" name="email" class="bg-white/10 text-white/90 py-2 px-5 text-xl rounded-full outline-0"
                    placeholder="Enter Your Email" />
            </div>
            <div class="w-full flex flex-col gap-1.5">
                <label class="float-left font-semibold text-white text-xl pl-3 italic">
                    Message:
                </label>
                <textarea name="message" class="bg-white/10 text-white/90 py-2 px-5 text-xl rounded-[25px] outline-0 w-full h-[20vh]"
                    placeholder="Enter Your Message"></textarea>
            </div>
            <div class="w-full flex justify-center">
                <button type="submit"
                    class="text-xl text-white font-semibold py-2 px-20 rounded-full cursor-pointer  bg-[#F50A0A] active:bg-white/50 active:text-black/60 w-100">
                    Submit
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
