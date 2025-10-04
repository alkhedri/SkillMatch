<x-layout>
  <x-card class="p-10 max-w-4xl mx-auto mt-8">
    <header class="text-center mb-8">
      <h2 class="text-2xl font-bold uppercase mb-1">اضف وظيفه جديده</h2>
      <p class="mb-4">---------------------------</p>
    </header>

    <form method="POST" action="/listings" enctype="multipart/form-data">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label for="company" class="inline-block text-lg mb-2">الشركة</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
            value="{{old('company')}}" />

          @error('company')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror

          <label for="location" class="inline-block text-lg mb-2 mt-6">الموقع</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
            placeholder="صبراتة , طرابلس ....." value="{{old('location')}}" />

          @error('location')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror

          <label for="website" class="inline-block text-lg mb-2 mt-6">رابط الموقع الالكتروني</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
            value="{{old('website')}}" />

          @error('website')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror

          <label for="logo" class="inline-block text-lg mb-2 mt-6">شعار الشركة</label>
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

          @error('logo')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div>
          <label for="title" class="inline-block text-lg mb-2">مسمى الوظيفة</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
            placeholder="مدير تسويق , اخصائي مونتاج , مصور ...." value="{{old('title')}}" />

          @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror

          <label for="email" class="inline-block text-lg mb-2 mt-6">البريد الالكتروني</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

          @error('email')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror

          <label for="tags" class="inline-block text-lg mb-2 mt-6">كلمات مفتاحيه (افصل بينهم بـ , )</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
            placeholder="مبتدئ , دوام جزئي ....." value="{{old('tags')}}" />

          @error('tags')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>

      <div class="mt-8">
        <label class="inline-block text-lg mb-2">نوع الوظيفة</label>
        <div class="flex flex-wrap gap-4 mt-2">
          @php
            $jobTypes = [
              'دوام كامل' => 'full_time',
              'دوام جزئي' => 'part_time',
              'عن بعد' => 'remote',
              'تدريب' => 'internship',
              'مؤقت' => 'temporary',
            ];
          @endphp
          @foreach($jobTypes as $label => $value)
            <label class="cursor-pointer">
              <input type="radio" name="job_type" value="{{ $value }}"
                class="peer sr-only"
                {{ old('job_type') == $value ? 'checked' : '' }}>
              <span class="px-6 py-2 rounded-full border border-gray-300 bg-gray-100 text-gray-700 font-semibold transition
                peer-checked:bg-laravel peer-checked:text-white peer-checked:border-laravel hover:bg-gray-200">
                {{ $label }}
              </span>
            </label>
          @endforeach
        </div>
        @error('job_type')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mt-8">
        <label for="description" class="inline-block text-lg mb-2">المتطلبات</label>
        <textarea name="description" rows="6" class="border border-gray-200 rounded p-2 w-full"
          placeholder="قم بإضافة التفاصيل هنا ........" required>{{old('description')}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="flex justify-between items-center mt-8">
        <a href="/" class="text-black mr-4 mt-4">رجــــوع</a>
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">نشر الوظيفة</button>
      </div>
    </form>
  </x-card>
</x-layout>
