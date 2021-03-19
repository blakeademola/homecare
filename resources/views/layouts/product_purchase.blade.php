<style>
    /* Float four columns side by side */
    .column {
        float: left;
        width: 25%;
        padding: 10px 10px;
    }

    /* Remove extra left and right margins, due to padding in columns */
    .row {
        margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Style the counter cards */
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;
    }

    /* Responsive columns - one column layout (vertical) on small screens */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
    }
</style>
@if (session()->has('success'))
    <ul class="alert alert-success small">
        {{session('success')}}
    </ul>
@endif
@if ($errors->any())
    <ul class="alert alert-danger small">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="row">

    @forelse($products as $product)

        <div class="card-group column">

            <div class="card" style="width: 18rem;">

                <img data-toggle="modal" data-backdrop="false" data-target="#exampleModal" src=" {{asset('images/icon/avatar-06.jpg')}}" class="card-img-top" alt="image here">
                <div class="card-body parent">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <p class="card-text" id="available-{{$product->id}}">Available Quantity : {{$product->quantity}}</p>
                    <form method="post" action="{{route('purchase')}}" id="to_submit">
                        {{ csrf_field() }}
                        @if($product->quantity > 1)
                        <p class="card-text">
                            <input type="number" class=" form-control quantity" data-id="{{$product->id }}"
                                   data-attr="{{$product->price}}" value="1" min="1"
                                   max="{{$product->quantity}}"
                                   name="qty"></p>
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <p class="card-text">
                        <h3 id="price-{{$product->id}}">${{$product->price}}</h3></p>
                         <button type="submit" class="btn btn-danger submit_button">Buy Now</button>
                        @else <strong>out of stock</strong>
                        @endif
                    </form>
                </div>

            </div>

        </div>

    @empty
        There are no items in shop
    @endforelse

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 15%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src=" {{asset('images/icon/avatar-06.jpg')}}" class="card-img-top" alt="image here">

            </div>
        </div>
    </div>
</div>
<script>
    $('document').ready(function () {
        $('.quantity').click(function () {
            var new_price = ($(this).val() * $(this).data('attr'));
            var id = $(this).data('id');
            console.log($(this).attr('max'));
            var reduced_qty = $(this).attr('max') - $(this).val();

            $("#price-" + id).text('$' + new_price);
            $("#buy_now-" + id).attr('value', $(this).val());
            $("#available-" + id).text('Available Quantity : '+ reduced_qty)
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus');
        });


    });


</script>


