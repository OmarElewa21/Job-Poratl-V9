<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        {!! Form::open(['url' => $submitUrl, 'files'=>'true']) !!}
            <div class="frame">
                <div class="center p-4">
                    {{Form::file('file')}}
                    {{Form::submit('Upload File', ['class'=>'btn btn-outline-success'])}}
                </div>
            </div>
        {{Form::Close()}}
    </div>
</div>
