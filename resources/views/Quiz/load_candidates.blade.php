<div class="modal-dialog" style="max-width: 80%;">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('messages.quizzes.list_candidates') }}</h5>
        </div>

        {!! Form::open(['id'=>'loadCandidatesForm']) !!}
        <div class="card-body">
            <table class="table table-responsive-sm table-striped table-bordered" id="load-candidates-table">
                <thead>
                    <tr>
                        <th scope="col" class="col-4">{{ __('messages.quizzes.candidate_name') }}</th>
                        <th scope="col" class="col-4">{{ __('messages.quizzes.candidate_email') }}</th>
                        <th scope="col" class="col-2">{{ __('messages.quizzes.take_number') }}</th>
                        <th scope="col" class="col-2">{{ __('messages.quizzes.select_to_send') }}</th>
                    </tr>
                </thead>

                <tbody>
                    <div class="d-none">
                        <input name="id" id="quiz_id" type="number" value="{{$quiz_id}}">
                    </div>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td> {{$candidate->first_name}} {{$candidate->last_name}} </td>
                            <td> {{$candidate->email}} </td>
                            <td> {{count($candidate->quizUser)}} </td>
                            <td>
                                <input type="checkbox" name='candidateList[{{$candidate->id}}]'>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right mb-3 mt-2 mr-2">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary mr-1','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" id="btnCancel" class="btn btn-light"
                                    data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script>
    $('#load-candidates-table').DataTable({
        order: [[0, 'asc']],
        columnDefs: [{
            "targets": [2,3],
            "orderable": false
        }]
    });
</script>