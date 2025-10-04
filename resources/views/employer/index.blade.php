<x-layout>


  <div class="container max-w-6xl  mx-auto">
    <div class="p-4 text-sm text-gray-800   bg-blue-100 dark:bg-gray-800 dark:text-gray-300" role="alert">
  <span class="text-2xl"> مرحباً بك في لوحة تحكم صاحب العمل!</span>
  <p class="mt-1 text-lg"> من هنا يمكنك إدارة وظائفك المنشورة، مراجعة طلبات التقديم، وإنشاء وظائف جديدة بسهولة. </p>
</div>
  </div>
<div class="max-w-6xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
  <div class="container mr-auto ml-auto md:col-span-2">


<div dir="rtl" x-data="{ tab: 'ready' }" class="max-w-4xl mr-1   bg-white shadow   p-6 border-r-4 border-r-blue-600">
  <!-- Tabs -->
  <div class="flex  gap-4 mb-6">
    <button
      @click="tab = 'ready'"
      :class="tab === 'ready' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
      class="px-4 py-2 rounded font-semibold transition duration-300"
    >
      الوظائف الجاهزة
    </button>
    <button
      @click="tab = 'custom'"
      :class="tab === 'custom' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
      class="px-4 py-2 rounded font-semibold transition duration-300"
    >
      كتابة وظيفة جديدة
    </button>
  </div>

  <!-- Ready-made Jobs -->
  <div x-show="tab === 'ready'" class="space-y-4">
    <h3 class="text-xl font-bold text-gray-800">اختر من الوظائف المقترحة:</h3>
   <div class="flex flex-wrap gap-3 mt-2">

       <label class="cursor-pointer mb-3 mt-2">
 @php
            $jobTitle = [


                'كاتب محتوى' => 'content_writer',
                'مسؤول دعم فني' => 'technical_support',
                'محاسب' => 'accountant',
                'مستشار موارد بشرية' => 'hr_consultant',
                'مصمم جرافيك' => 'graphic_designer',
                'مدير تسويق' => 'marketing_manager',
                'مطور ويب' => 'web_developer',
                'مهندس برمجيات' => 'software_engineer',
                'محلل بيانات' => 'data_analyst',

            ];
          @endphp
         @foreach($jobTitle as $label => $value)
  <label class="cursor-pointer">
    <input type="radio" name="job_type" value="{{ $value }}"
      class="peer sr-only"
      {{ old('job_type') == $value ? 'checked' : '' }}>
    <span class="inline-block px-5 py-2 my-1 rounded-full border border-gray-300 bg-gray-100 text-gray-700 font-medium transition
      peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 hover:bg-gray-200">
      {{ $label }}
    </span>
  </label>
@endforeach

      <!-- Add more job buttons as needed -->
    </div>
    <div class="text-center mt-6">
      <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-5 rounded font-medium">
        متابعة وإنشاء الوظيفة
      </button>
    </div>
  </div>

  <!-- Custom Job Form -->
  <div x-show="tab === 'custom'" class="space-y-4">
    <h3 class="text-xl font-bold text-gray-800">أدخل تفاصيل الوظيفة:</h3>
    <div class="space-y-3">
      <input type="text" placeholder="المسمى الوظيفي" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      <textarea placeholder="الوصف الوظيفي" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
      <input type="text" placeholder="الموقع" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="text-center mt-6">
      <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-5 rounded font-medium">
            استكمال بيانات الوظيفة
      </button>
    </div>
  </div>
</div>


 <!-- applicationRequests -->

<div dir="rtl" class="max-w-4xl   mt-10 bg-white   shadow p-6 border-r-4 border-blue-600">
  <h2 class="text-2xl font-bold text-gray-800 mb-6">طلبات التقديم</h2>

   <table class="min-w-full bg-white rounded-lg shadow-sm">
    <thead>
      <tr class="bg-gray-100 text-gray-700">
        <th class="py-3 px-6 text-center font-semibold">المسمى الوظيفي</th>
        <th class="py-3 px-6 text-center font-semibold">المتقدمين</th>
        <th class="py-3 px-6 text-center font-semibold">الإجراءات</th>
      </tr>
    </thead>
    <tbody>
      <!-- Example Row -->
      <tr class="border-b hover:bg-gray-50 transition">
        <td class="px-6 py-4 text-center text-lg font-medium text-indigo-700">
          <a href="#" class="hover:underline">مصمم جرافيك</a>
        </td>
        <td class="px-6 py-4 text-center">
          15
        </td>
        <td class="px-6 py-4 text-center">
          <a href="#" class="inline-flex items-center gap-2 bg-blue-100 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-200 transition">
            <i class="fa-solid fa-eye"></i> عرض المتقدمين
          </a>
        </td>
      </tr>
      <!-- Add more rows as needed -->
    </tbody>
   </table>



</div>

 </div>
  <!-- Similar Jobs Side Card (1/3) -->
    <aside class="md:col-span-1">

   <div dir="rtl" class="bg-white   shadow-md p-6 max-w-md mx-auto text-center ">
  <!-- Logo Placeholder -->
  <div class="flex justify-center mb-4">
    <div class="w-24 h-24 bg-gray-100 border rounded-lg flex items-center justify-center">
      @if(auth()->user()->logo)
        <img src="{{ asset('storage/' . auth()->user()->logo) }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover rounded-lg" />
      @else
        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
        </svg>


      @endif
    </div>
  </div>
 @if(!auth()->user()->logo)
  <!-- Add Logo Button -->
  <form action="  route('company.uploadLogo')  " method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    <label for="logo-upload" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white  cursor-pointer hover:bg-indigo-700 transition">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M15.172 7l-6.586 6.586a2 2 0 002.828 2.828L18 9.828V7h-2.828z" />
      </svg>
      أضف لوجو الشركة
    </label>
    <input type="file" id="logo-upload" name="logo" class="hidden" />
  </form>
@endif
  <!-- View Company Page -->
  <a href="  route('company.show', $company->id)  "
     class="inline-flex items-center gap-2 text-indigo-600 hover:underline text-sm font-medium">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      <path d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
    </svg>
    عرض صفحة الشركة
  </a>
</div>



    </aside>
    </div>
</x-layout>
