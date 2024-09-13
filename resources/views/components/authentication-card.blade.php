<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900" style="background-image: url('{{asset('assets/images/whatsacppback.jpg')}}'); background-size: cover; background-position: center;">
      {{-- <!-- Overlay -->
      <div class="absolute inset-0 bg-black opacity-50"></div> --}}
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4  dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" style="background-color: #145353;">
        {{ $slot }}
    </div>
</div>
