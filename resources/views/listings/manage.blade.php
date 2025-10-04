<x-layout>
  <div class="max-w-4xl mx-auto mt-10">
    <x-card class="p-8 shadow-lg rounded-lg bg-white">
      <header class="mb-8">
        <h1 class="text-3xl text-center font-bold uppercase text-laravel tracking-wide">
          إدارة طلبات الوظائف
        </h1>
      </header>

      <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-sm">
          <thead>
            <tr class="bg-gray-100 text-gray-700 text-sm">
              <th class="py-4 px-6 text-center font-semibold">العنوان</th>
              <th class="py-4 px-6 text-center font-semibold">تعديل</th>
              <th class="py-4 px-6 text-center font-semibold">حذف</th>
            </tr>
          </thead>
          <tbody>
            @unless($listings->isEmpty())
              @foreach($listings as $listing)
                <tr class="border-b hover:bg-gray-50 transition">
                  <td class="px-6 py-4 text-center text-lg font-medium text-indigo-700">
                    <a href="/listings/{{$listing->id}}" class="hover:underline">{{$listing->title}}</a>
                  </td>
                  <td class="px-6 py-4 text-center">
                    <a href="/listings/{{$listing->id}}/edit"
                      class="inline-flex items-center gap-2 bg-blue-100 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-200 transition">
                      <i class="fa-solid fa-pen-to-square"></i>
                      تعديل
                    </a>
                  </td>
                  <td class="px-6 py-4 text-center">

                 <a href="#" onclick="confirmDelete({{$listing->id}})" class="inline-flex items-center gap-2 bg-red-100 text-red-600 px-4 py-2 rounded-lg hover:bg-red-200 transition">
    <i class="fa-solid fa-trash"></i> حذف
</a>

<form method="POST" id="delete-form-{{$listing->id}}" action="/listings/{{$listing->id}}" style="display: none;">
    @csrf
    @method('DELETE')
</form>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="3" class="px-6 py-8 text-center text-gray-500 text-lg">
                  <p>لا توجد وظائف حتى الآن</p>
                </td>
              </tr>
            @endunless
          </tbody>
        </table>
      </div>
    </x-card>
  </div>
</x-layout>
