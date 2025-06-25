<div>
    @if(empty($shop->filename))
    <img src="{{asset('images/no_image.jpg')}}">
    @else
    <img src="{{ asset('stotage/shops/' . $shop->filename) }}">
    @endif
</div>