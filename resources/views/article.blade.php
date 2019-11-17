
@guest {{-- User déconnecté --}}
@include('layouts/article(guest)', ['id', $id]);

{{-- User connecté --}}
@else
@include('layouts/article(connected_user)', ['id', $id]);
@endguest