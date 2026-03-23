@extends('layouts.app')
@section('body-class', 'page-static page-static--{{ $page->slug }}')

@section('title', \InnoShop\Common\Libraries\MetaInfo::getInstance($page)->getTitle())
@section('description', \InnoShop\Common\Libraries\MetaInfo::getInstance($page)->getDescription())
@section('keywords', \InnoShop\Common\Libraries\MetaInfo::getInstance($page)->getKeywords())

@section('content')
  @hookinsert('page.show.top')

  @if(isset($result))
    {!! $result !!}
  @elseif($page->slug === 'about')
    @include('pages._about')
  @elseif($page->slug === 'creations')
    @include('pages._creations')
  @elseif($page->slug === 'services')
    @include('pages._services')
  @elseif($page->slug === 'contact')
    @include('pages._contact')
  @else
    <x-front-breadcrumb type="page" :value="$page" />
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-9">
          <h1 class="page-static-title">{{ $page->translation->title }}</h1>
          <div class="page-static-body">
            {!! $page->translation->content !!}
          </div>
        </div>
      </div>
    </div>
  @endif

  @hookinsert('page.show.bottom')
@endsection
