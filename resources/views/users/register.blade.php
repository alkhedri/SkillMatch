<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-4">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">لوحة التسجيل</h2>
      <p class="mb-4">إنظم إلينا للتقديم ونسر الوظائف</p>
    </header>

    <form method="POST" action="/register-step-1">
      @csrf

      <div class="mb-6 flex items-center">
        <label for="name" class="inline-block text-lg mb-0 w-1/3"> الاسم </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-2/3" name="name" value="{{old('name')}}" />
      </div>
      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6 flex items-center">
        <label for="email" class="inline-block text-lg mb-0 w-1/3">البريد الالكتروني</label>
        <input type="email" class="border border-gray-200 rounded p-2 w-2/3" name="email" value="{{old('email')}}" />
      </div>
      @error('email')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6 flex items-center">
        <label for="role" class="inline-block text-lg mb-0 w-1/3">نوع الحساب</label>
        <select name="role" id="role" class="border border-gray-200 rounded p-2 w-2/3">
          <option value="1" {{ old('role') == 'company' ? 'selected' : '' }}>شركة</option>
          <option value="2" {{ old('role') == 'user' ? 'selected' : '' }}>مستخدم</option>
        </select>
      </div>
      @error('role')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6 flex items-center">
        <label for="password" class="inline-block text-lg mb-0 w-1/3">كلمة المرور</label>
        <input type="password" class="border border-gray-200 rounded p-2 w-2/3" name="password" value="{{old('password')}}" />
      </div>
      @error('password')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6 flex items-center">
        <label for="password2" class="inline-block text-lg mb-0 w-1/3">تأكيد كلمة المرور</label>
        <input type="password" class="border border-gray-200 rounded p-2 w-2/3" name="password_confirmation" value="{{old('password_confirmation')}}" />
      </div>
      @error('password_confirmation')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black w-full">
         إنظم إلينا
        </button>
      </div>

      <div class="mt-8 text-left">
        <p>
          هل تملك حساب مسبقا ؟
          <a href="/login" class="text-laravel">سجل دخولك الان</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>
