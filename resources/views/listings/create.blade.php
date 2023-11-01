<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                POST A CLUB
            </h2>
            <p class="mb-4">Post a club to swap</p>
        </header>

        <form action="/listings" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="inline-block text-md mb-1">Club Name</label>
                <input type="text" class="border border-gray-200 rounded p-1 w-full" name="title" id='title'
                    placeholder="Example: Big Bertha, M4, Pro V1" value="{{old('title')}}"/>

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="brand" class="inline-block text-md mb-1">
                    Brand
                </label>
                    <select
                        type="text"
                        class="border border-gray-200 rounded p-1 w-full"
                        id='tags'
                        name="tags"
                        value="{{old('brand')}}">
                    <option default disabled value="">Select brand</option>
                    <option value="Titleist">Titleist</option>
                    <option value="TaylorMade">TaylorMade</option>
                    <option value="Callaway">Callaway</option>
                    <option value="PING">PING</option>
                    <option value="Mizuno">Mizuno</option>
                    <option value="Cleveland">Cleveland</option>
                    <option value="Srixon">Srixon</option>
                    <option value="Cobra">Cobra</option>
                    <option value="Wilson">Wilson</option>
                    <option value="Bridgestone">Bridgestone</option>
                    <option value="Odyssey">Odyssey</option>
                    <option value="Scotty Cameron">Scotty Cameron</option>
                    <option value="Adams">Adams</option>
                    <option value="PXG">PXG</option>
                    <option value="Tour Edge">Tour Edge</option>
                    <option value="Ben Hogan">Ben Hogan</option>
                    <option value="Miura">Miura</option>
                    <option value="Bettinardi">Bettinardi</option>
                    <option value="Honma">Honma</option>
                    <option value="Rife">Rife</option>
                </select>

                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror 
            </div>

            <div class="mb-4">
                <label for="images" class="inline-block text-md mb-1">
                    Images
                </label>
                <input type="file" class="border border-gray-200 rounded p-1 w-full" name="images" id="images"/>

                @error('images');
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="inline-block text-md mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" id='description'
                    placeholder="Looking to swap this club for a driver, enjoyed this club but looking for something with more flex..." >{{old('description')}}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button class="bg-black text-white rounded py-2 px-4 hover:bg-cslightgreen">
                    Create Post
                </button>

                <a href="/" class="text-black ml-4 hover:text-cslightgreen hover:underline"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
