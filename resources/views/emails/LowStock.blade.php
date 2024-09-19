@foreach ($items as $item)
            <div class="row">
                <div class="col-md-2">
                    <p class="mb-0">{{ $item->name }} - {{ $item->quantity }} </p><br>
                </div>
            </div>
    @endforeach