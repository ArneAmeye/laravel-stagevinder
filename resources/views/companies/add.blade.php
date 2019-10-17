@extends('layouts/app')

@section('title')
    Add Company
@endsection
@section('stylesheet')
	{{ asset('css/pages/index.css') }}
@endsection
@section('content')
    @component('components/breadcrumb')
        @slot('icon')
			fa-plus
		@endslot
		@slot('breadcrumb')
		@endslot
	@endcomponent
    <div class="preview__container">
       <form>
           <label for="companyName"></label>
           <input type="text" name="companyName" id="companyName">
           <label for="companyLocation"></label>
           <input type="text" name="companyLocation" id="companyLocation">

           <label for="address">Address:</label>
           <input type="text" name="address" id="address">
           <label for="postalCode">Postal Code:</label>
           <input type="text" name="postalCode" id="postalCode">
           <label for="city">City</label>
           <input type="text" name="city" id="city">
           <label for="country">Country</label>
           <input type="text" name="country" id="country">
           <label for="longitude">Longitude</label>
           <input class="hidden" type="text" name="longitude" id="longitude">
           <label for="latitude">latitude</label>
           <input class="hidden" type="text" name="latitude" id="latitude">

           <label for="logo">Logo:</label>
           <input type="text" name="logo" id="logo">
           <label for="website">Website:</label>
           <input type="text" name="website" id="website">

           <label for="contactEmail">Contact Email:</label>
           <input type="text" name="contactEmail" id="contactEmail">
           <label for="contactPhone">Contact Phone:</label>
           <input type="text" name="contactPhone" id="contactPhone">

           <p onclick="getCompanyDetails()">Click me</p>
       </form>
       <p id="businessLocation">Brussel</p>
       <p id="businessName">Huntrs</p>
       
       
    </div>
@endsection
@section('script')
    {{ asset ('js/ajax.js') }}
@endsection