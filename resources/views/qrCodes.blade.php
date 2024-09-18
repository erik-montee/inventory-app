<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container text-center">
    @foreach ($records as $record)
            <div class="row">
                <div class="col-md-2">
                    <p class="mb-0">{{ $record->name }}</p>
                   {!! $record->renderQr() !!}<br/>
                </div>
            </div>
    @endforeach
        </div>