@extends('components/layout')
@section('content')

<div class="container" style="
  display:grid;
  grid-template-columns:25% 50% 25%;
  gap:20px;
  margin: 0;
"> 
  <div class="left-column">
      <x-card class="p-10">
        </x-card>
  </div>

  <div class="middle-column">
     <x-card class="p-10">
       <header>
         <h1 class="text-3xl text-center font-bold my-6 uppercase">User Profile</h1>
       </header>
       </x-card> 
  </div>

  <div class="right-column">
     <x-card class="p-10">
        <header>
          <h1 class="text-3xl text-center font-bold my-6 uppercase">Random Links</h1>
        </header>
        </x-card>
  </div>

</div> @endsection
