<!-- filepath: c:\xampp\htdocs\SkillMatch-BETAv2\resources\views\users\register-step2.BLADE.PHP -->
<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-4">
    <!-- Progress Hero -->
    <div class="mb-8">
      <div class="flex items-center justify-center space-x-4 rtl:space-x-reverse">
        <div class="flex flex-col items-center">
          <div class="w-8 h-8 rounded-full bg-laravel text-white flex items-center justify-center font-bold">1</div>
          <span class="text-xs mt-2">الخطوة الأولى</span>
        </div>
        <div class="w-12 h-1 bg-laravel"></div>
        <div class="flex flex-col items-center">
          <div class="w-8 h-8 rounded-full bg-black text-white flex items-center justify-center font-bold">2</div>
          <span class="text-xs mt-2">الخطوة الثانية</span>
        </div>
      </div>
      <h2 class="text-center text-xl font-bold mt-6 text-laravel">أنت الآن في الخطوة الثانية</h2>
    </div>

    <header class="text-center mb-8">
      <h2 class="text-2xl font-bold uppercase mb-1">معلومات إضافية</h2>
      <p class="mb-4">يرجى إكمال البيانات التالية</p>
    </header>

    <form method="POST" action="/register-step-2">
      @csrf

      <div class="mb-6 flex items-center">
        <label for="country" class="inline-block text-lg mb-0 w-1/3">الدولة</label>
        <select name="country" id="country" class="border border-gray-200 rounded p-2 w-2/3">
          <option value="">اختر الدولة</option>
          <option value="sa">السعودية</option>
          <option value="eg">مصر</option>
          <option value="jo">الأردن</option>
          <option value="ae">الإمارات</option>
          <!-- Add more countries as needed -->
        </select>
      </div>
      @error('country')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6 flex items-center">
        <label for="city" class="inline-block text-lg mb-0 w-1/3">المدينة</label>
        <select name="city" id="city" class="border border-gray-200 rounded p-2 w-2/3">
          <option value="">اختر المدينة</option>
          <option value="riyadh">الرياض</option>
          <option value="jeddah">جدة</option>
          <option value="cairo">القاهرة</option>
          <option value="amman">عمان</option>
          <option value="dubai">دبي</option>
          <!-- Add more cities as needed -->
        </select>
      </div>
      @error('city')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6 flex items-center">
        <label for="nationality" class="inline-block text-lg mb-0 w-1/3">الجنسية</label>
        <select name="nationality" id="nationality" class="border border-gray-200 rounded p-2 w-2/3">
          <option value="">اختر الجنسية</option>
          <option value="saudi">سعودي</option>
          <option value="egyptian">مصري</option>
          <option value="jordanian">أردني</option>
          <option value="emirati">إماراتي</option>
          <!-- Add more nationalities as needed -->
        </select>
      </div>
      @error('nationality')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6 flex items-center">
        <label for="education_level" class="inline-block text-lg mb-0 w-1/3">المستوى التعليمي</label>
        <select name="education_level" id="education_level" class="border border-gray-200 rounded p-2 w-2/3">
          <option value="">اختر المستوى</option>
          <option value="high_school">ثانوي</option>
          <option value="bachelor">بكالوريوس</option>
          <option value="master">ماجستير</option>
          <option value="phd">دكتوراه</option>
        </select>
      </div>
      @error('education_level')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6 flex items-center">
        <label for="birthdate" class="inline-block text-lg mb-0 w-1/3">تاريخ الميلاد</label>
        <select name="birthdate" id="birthdate" class="border border-gray-200 rounded p-2 w-2/3">
          <option value="">اختر السنة</option>
          @for($year = date('Y')-60; $year <= date('Y')-16; $year++)
            <option value="{{$year}}" {{ old('birthdate') == $year ? 'selected' : '' }}>{{$year}}</option>
          @endfor
        </select>
      </div>
      @error('birthdate')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror

      <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black w-full">
         إكمال التسجيل
        </button>
      </div>
    </form>
  </x-card>
</x-layout>
