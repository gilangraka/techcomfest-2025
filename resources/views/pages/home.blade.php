@extends('layouts.app')

@section('title', 'Techomfest 2025 Digital Horizons: Pioneering New Frontiers')

@section('content')
  <x-sections.hero-section/>
  <x-sections.about-section/>
  <x-sections.category-section :categoryItems="$categoryItems"/>
  <x-sections.timeline-section :timelineItems="$timelineItems"/>
  <x-sections.faq-section :faqItems="$faqItems"/>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
