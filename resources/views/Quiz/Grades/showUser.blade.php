<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{ !$is_guest ? __('messages.quizzes.gradeUser') : __('messages.quizzes.gradeGuest') }} </h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
            <div class="results-content">
                <div>
                    <h6 class="d-flex justify-content-around row">
                        @if ($is_guest)
                            <span class="col-4">Name:</span>
                            <span class="col-4">{{$user->name}}</span> 
                        @else   
                            <span class="col-4">Name:</span>
                            <span class="col-4">{{$user->first_name . ' ' . $user->last_name}}</span>
                        @endif    
                    </h6>
                    
                    <h6 class="d-flex justify-content-around row mt-3">
                        <span class="col-4">Email:</span>
                        <span class="col-4">{{$user->email}}</span>
                    </h6>

                    @if (!$is_guest)
                        <h6 class="d-flex justify-content-around row mt-3">
                            <span class="col-4">Phone:</span>
                            <span class="col-4">{{!is_null($user->phone) ? $user->phone : 'Undefined'}}</span>
                        </h6>
                        <h6 class="d-flex justify-content-around row mt-3">
                            <span class="col-4">Gender:</span>
                            <span class="col-4">{{!is_null($user->gender) ? $user->gender : 'Undefined'}}</span>
                        </h6>
                        <h6 class="d-flex justify-content-around row mt-3">
                            <span class="col-4">Country:</span>
                            <span class="col-4">{{!is_null($user->country) ? $user->country->name : 'Undefined' }}</span>
                        </h6>
                        <h6 class="d-flex justify-content-around row mt-3">
                            <span class="col-4">City:</span> 
                            <span class="col-4">{{!is_null($user->city) ? $user->city->name : 'Undefined'}}</span>
                        </h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-dialog{
        max-width: 700px;
    }
</style>