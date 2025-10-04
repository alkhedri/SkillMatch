<!DOCTYPE html>
<html lang="ar"  dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            laravel: '#51A3E0',
          },
          fontFamily: {
            cairo: ['Cairo', 'sans-serif'],
          },
        },
      },
    }
  </script>
  <title>SkillMatch | Find Jobs & oppurtionities </title>
</head>

<body class="mb-48 font-cairo bg-gray-50">
    @include('sweetalert::alert')

  {{-- <nav class="flex justify-between items-center mb-4">
     <ul class="flex space-x-6 mr-6 text-lg">
      @auth

      <li>
        <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage Listings</a>
      </li>
      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-door-closed"></i> Logout
          </button>
        </form>
      </li>
      @else
      <li>
          <a href="/login" class="hover:text-laravel mr-3 mt-4"><i class="fa-solid fa-arrow-right-to-bracket"></i> تسجيل الدخول</a>

      </li>

      @endauth
    </ul>

     <a href="/"><img class="w-24 ml-3 mt-3" src="{{asset('images/logo.png')}}" alt="" class="logo  " /></a>

  </nav> --}}
<nav class=" border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/"><img class="w-24 ml-3 mt-3" src="{{asset('images/logo.png')}}" alt="" class="logo  " /></a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
           @auth
        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-10 h-10 rounded-full" src="{{asset('images/profile.png')}}" alt="user photo">
      </button>

      @else
    <a href="/login" class="text-white bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center  md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">تسجيل الدخول</a>



        @endauth
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        @auth
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white"> {{auth()->user()->name}}</span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{auth()->user()->email}}</span>
        </div>
        @endauth
        <ul class="py-2" aria-labelledby="user-menu-button">
             @auth
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">الاعدادات</a>
          </li>
          <li>
            @if(auth()->user() && auth()->user()->role == '1')
            <a href="/listings/manage" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">طلبات الوظائف</a>
            @else
            <a href="/jobseeker/manage" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">طلبات التقديم</a>
            @endif
        </li>

          <li>

          <form class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" method="POST" action="/logout">
          @csrf
          <button type="submit">
              تسجيل الخروج
          </button>
        </form>
        </li>
        @else
          <li>
            <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">تسجيل الدخول</a>
          </li>
          <li>
            <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">إنشاء حساب</a>
          </li>
          @endauth
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col md:flex-row md:space-x-8 rtl:space-x-reverse mt-4 md:mt-0 text-sm font-medium">
        <li>
          <a href="{{route('employer')}}" class="text-lg block py-2 px-4 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">لوحة التحكم</a>
        </li>
        <li>
          <a href="#" class="text-lg block py-2 px-4 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">الوظائف</a>
        </li>
        <li>
          <a href="#" class="text-lg block py-2 px-4 text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">تواصل معنا</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <main class="">
    {{$slot}}
  </main>
  <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2025, All Rights reserved</p>
@if(auth()->user() && auth()->user()->role == '1')
    <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">نشر وظيفه جديدة</a>

@endif
     </footer>

  <x-flash-message />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: "لن تتمكن من التراجع بعد الحذف!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'نعم، احذفها!',
        cancelButtonText: 'إلغاء'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    });
}
</script>

</body>
</html>
