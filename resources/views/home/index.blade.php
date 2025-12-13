@extends('layouts.app')

@section('content')
<x-home.hero />
<x-home.services :services="$services" />
<x-home.gallery :services="$services" />
<x-home.works-tabs />
<x-home.latest-posts :posts="$latestPosts" />
<x-home.governorates />
<section class="container mx-auto px-4 py-12">
    <x-contact.form />
</section>
@endsection
