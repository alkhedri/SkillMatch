<x-layout>
  <div class="max-w-5xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Main Content (2/3) -->
    <div class="md:col-span-2">

      <!-- Main Card -->
      <x-card class="p-8 shadow-lg rounded-lg bg-white mb-8">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
          <!-- Logo -->
          <img class="w-32 h-32 object-contain rounded border bg-gray-50"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="Company Logo" />

          <div class="flex-1 text-center md:text-right">
            <h3 class="text-3xl font-bold text-indigo-700 mb-2">{{$listing->title}}</h3>
            <div class="text-xl font-semibold text-gray-800 mb-2">{{$listing->company}}</div>
            <div class="flex flex-wrap justify-center md:justify-end gap-2 mb-4">
              <x-listing-tags :tagsCsv="$listing->tags" />
            </div>
            <div class="text-lg text-gray-600 mb-2">
              <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
            <div class="text-sm text-gray-400">تاريخ الإعلان: منذ 42 دقيقة</div>
          </div>
        </div>

        <!-- Description Card -->
        <div class="mt-8">
          <h3 class="text-2xl font-bold text-laravel mb-4">🧾 الوصف العام للوظيفة</h3>
          <p class="text-lg text-gray-700 leading-relaxed mb-6">{{$listing->description}}</p>
          <div class="flex flex-col md:flex-row gap-4">
            <a href="mailto:{{$listing->email}}"
              class="flex-1 bg-laravel text-white py-2 rounded-xl text-center font-semibold hover:bg-black transition">
              <i class="fa-solid fa-envelope"></i> تواصل مع صاحب العمل
            </a>
            <a href="{{$listing->website}}" target="_blank"
              class="flex-1 bg-black text-white py-2 rounded-xl text-center font-semibold hover:bg-laravel transition">
              <i class="fa-solid fa-globe"></i> زيارة الموقع
            </a>
          </div>
        </div>

        <!-- Job Details Card -->
        <div class="mt-8">
          <h3 class="text-lg font-semibold text-indigo-600 mb-4">تفاصيل الوظيفة</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
            <div>
              <ul class="space-y-2">
                <li><span class="font-semibold">الراتب:</span> 6000 - 8000 جنيه مصري</li>
                <li><span class="font-semibold">نوع الوظيفة:</span> دوام كامل</li>
                <li><span class="font-semibold">المؤهل المطلوب:</span> تناسب كل المؤهلات</li>
              </ul>
            </div>
            <div>
              <ul class="space-y-2">
                <li><span class="font-semibold">السن المطلوب:</span> من 18 إلى 40 سنة</li>
                <li><span class="font-semibold">الخبرة:</span> لا يشترط</li>
                <li><span class="font-semibold">اللغة الإنجليزية:</span> لا يشترط</li>
                <li><span class="font-semibold">الحاسب الآلي / مايكروسوفت أوفيس:</span> لا يشترط</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Footer: Apply Button & Counter -->
        <footer class="mt-10 pt-6 border-t flex flex-col md:flex-row items-center justify-between gap-4">
            @if(isset($requestExists) && $requestExists)
                <div class="text-green-600 font-bold text-lg">
                    لقد تقدمت لهذه الوظيفة بالفعل
                </div>
            @else
          <form method="POST" action=" {{route('request', $listing->id) }}">
            @csrf
            <button type="submit" class="bg-laravel text-white px-6 py-2 rounded-lg font-semibold hover:bg-black transition">
              تقدم للوظيفة
            </button>
          </form>
            @endif
          <div class="text-gray-600 text-lg flex items-center gap-2">
            <i class="fa-solid fa-users text-laravel"></i>
            <h2>عدد المتقدمين: <span class="font-bold"> {{$applicationRequestsCount}} </span></h2>
          </div>
        </footer>
      </x-card>

      <!-- Job Details Card -->

    </div>

    <!-- Similar Jobs Side Card (1/3) -->
    <aside class="md:col-span-1">
      <x-card class="p-6 shadow rounded-lg bg-white sticky top-8">
        <h3 class="text-lg font-semibold text-indigo-600 mb-4">وظائف مشابهة</h3>
        <ul class="space-y-4">
          <!-- Example similar job 1 -->
          <li class="flex items-center gap-3">
            <a href="/listings/1" class="flex-shrink-0">
              <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="w-10 h-10 rounded border bg-gray-100 object-contain" />
            </a>
            <div>
              <a href="/listings/1" class="font-semibold text-laravel hover:underline block">Media Buyer - كويكس</a>
              <span class="text-xs text-gray-500">طرابلس  | خبرة: سنة واحدة</span>
            </div>
          </li>
          <!-- Example similar job 2 -->
          <li class="flex items-center gap-3">
            <a href="/listings/2" class="flex-shrink-0">
              <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="w-10 h-10 rounded border bg-gray-100 object-contain" />
            </a>
            <div>
              <a href="/listings/2" class="font-semibold text-laravel hover:underline block">Media Buyer - المجموعة الدولية</a>
              <span class="text-xs text-gray-500"> صبراتة | دوام كامل</span>
            </div>
          </li>
          <!-- Example similar job 3 -->
          <li class="flex items-center gap-3">
            <a href="/listings/3" class="flex-shrink-0">
              <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="w-10 h-10 rounded border bg-gray-100 object-contain" />
            </a>
            <div>
              <a href="/listings/3" class="font-semibold text-laravel hover:underline block">مسئول تسويق الكتروني</a>
              <span class="text-xs text-gray-500"> صبراتة | بدون خبرة</span>
            </div>
          </li>
          <!-- Example similar job 4 -->
          <li class="flex items-center gap-3">
            <a href="/listings/4" class="flex-shrink-0">
              <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="w-10 h-10 rounded border bg-gray-100 object-contain" />
            </a>
            <div>
              <a href="/listings/4" class="font-semibold text-laravel hover:underline block">أخصائي حملات إعلانية</a>
              <span class="text-xs text-gray-500"> بنغازي | دوام جزئي</span>
            </div>
          </li>
        </ul>
      </x-card>
    </aside>
  </div>
</x-layout>
