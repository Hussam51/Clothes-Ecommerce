@props(['name' ,'checked'])


@foreach ($permissions as $value=>$text )
<input type="checkbox" name="{{$name}}" value="{{$value->id}}" @checked(old($name,$checked)== $value->id)
{{$attributes->class(['form-control'])}} />
<label for="{{$value->id}}">{{$text}}</label>
<br/>


@endforeach
