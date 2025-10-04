<x-layout>
  @if (!Auth::check())
    @include('partials._hero')
  @endif

  <div class="container mr-auto ml-auto">


  @include('partials._search')
 </div>
  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($listings) == 0)

    @foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
    @endforeach

    @else
    <p>No listings found</p>
    @endunless

  </div>

  <div class="container mr-auto ml-auto mt-3">
    {{$listings->links()}}
  </div>
</x-layout>
