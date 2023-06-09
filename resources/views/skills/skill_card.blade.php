<div class="col-xl-4 col-md-6 candidate-card">
    <div class="hover-effect-employee position-relative mb-5 border-hover-primary employee-border">
        <div class="employee-listing-details">
            <div class="d-flex employee-listing-description align-items-center justify-content-center flex-column">
                <div class="w-100">
                    <div class="text-left  employee-data text-limit">
                        <span class="text-decoration-none text-color-gray">
                            <a href="#" class="show-btn"
                               data-id="{{$skill->id}}">{{ '(' . $skill->id . ') ' . Str::limit($skill->name,30) }}</a>
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="employee-action-btn">
            <a title="{{ __('messages.quizzes.classes') }}" class="btn btn-info action-btn"
               href="#" onclick="classes({{$skill->id}})">
               <i class="far fa-folder"></i>
            </a>
            <a title="{{ __('messages.common.edit') }}" class="btn btn-warning action-btn edit-btn"
               data-id="{{$skill->id}}" href="#">
                <i class="fa fa-edit"></i>
            </a>
            <a title="{{ __('messages.common.delete') }}" class="btn btn-danger action-btn delete-btn"
               data-id="{{$skill->id}}" href="#">
                <i class="fa fa-trash"></i>
            </a>
        </div>
    </div>
</div>
