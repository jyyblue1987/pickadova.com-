<?xml version="1.0" encoding="UTF-8"?>

<markers>
@foreach($user as $key =>$v)
<marker id="{{$v->id}}" name="{{$v->fname}} {{$v->lname}}" address="{{$v->address}}" lat="{{$v->lat}}" lng="{{$v->lang}}" icon="{{URL::ASSET('uploaded/icon')}}/{{$v->image}}" type="restaurant"/>
@endforeach
</markers>