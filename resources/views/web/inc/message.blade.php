@if (session('success'))

<div class="alret alert-success p-5 text-center">
    {{ session('success') }}
</div>
@endif
@if ($errors->any())

<div class="alret alert-danger p-5 text-center">
    @foreach ($errors->all() as $error)
         <p>{{ $error }}</p>
    @endforeach

</div>
@endif
@if (session('error'))
<div class="alret alert-danger p-5 text-center ">
        {{ session('error') }}
    </div>
@endif
