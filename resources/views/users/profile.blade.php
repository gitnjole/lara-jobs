@extends('components/layout')
@section('content')

<div class="container mx-auto grid grid-cols-3 gap-20"> 
  <div class="left-column">
    <x-card class="p-10">
      <h1 class="text-3xl text-center font-bold my-6 uppercase">Banner / Profile photo</h1>
    </x-card>
  </div>

  <div class="middle-column">
    <x-card class="p-10">
        <h1 class="text-3xl text-center font-bold my-6 uppercase">User Profile Details</h1>
    </x-card> 
  </div>

  <div class="right-column">
    <x-card class="p-10">
        <h1 class="text-3xl text-center font-bold my-6 uppercase">Links</h1>
    </x-card>
  </div>
</div> 
@endsection
