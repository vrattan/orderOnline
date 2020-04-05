@extends('layouts.app')
@section('title')
<title>Countries</title>
@endsection
@section('page-title')
<div class="page-title">
    <span>Countries</span>
</div>
@endsection
@section('content')

<div> 
	<router-view></router-view> 
</div>
@endsection