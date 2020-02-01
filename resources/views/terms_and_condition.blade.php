@extends('layouts.app')

@section('content')


    <div class="shadow chat_maincontent">
        <div class="pink_bar chat_pinkbar">Terms And Condition</div>
        <div class="contact_main">
             <div class="row" style="padding: 50px">
               @php echo html_entity_decode($terms_and_condition) @endphp
             </div>
        </div>
    </div>


@endsection