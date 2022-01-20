<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{$category->name}} </h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
            <div class="">
                <p>{{$category->description}}</p>
            </div>
            <div class="d-flex flex-column mt-5 p-2">
                @if (count($category->sub_categories) > 0)
                    <button type="button" class="btn btn-outline-primary p-2 mb-2" onclick="optionBox.add('{{$category->id}}', 'parent')"> {{__('messages.quizzes.add_parent_category')}} </button>
                    <button type="button" class="btn btn-outline-primary p-2 mb-2" onclick="optionBox.add('{{$category->id}}', 'child')"> {{__('messages.quizzes.add_sub_category')}} </button>

                    @elseif(count($category->sub_categories) == 0 && count($category->category_questions) == 0)
                        <button type="button" class="btn btn-outline-primary p-2 mb-2" onclick="optionBox.add('{{$category->id}}', 'parent')"> {{__('messages.quizzes.add_parent_category')}} </button>
                        <button type="button" class="btn btn-outline-primary p-2 mb-2" onclick="optionBox.add('{{$category->id}}', 'child')"> {{__('messages.quizzes.add_sub_category')}} </button>
                        <button type="button" class="btn btn-outline-success p-2 mb-2" onclick="questions.add({{$category->id}})"> {{__('messages.quizzes.question_add')}} </button>
                
                    @elseif(count($category->category_questions) > 0)
                        <button type="button" class="btn btn-outline-primary p-2 mb-2" onclick="questions.add({{$category->id}})"> {{__('messages.quizzes.question_add')}} </button>
                        <button type="button" class="btn btn-outline-info p-2 mb-2" onclick="window.location='{{route('question.index', ['category_id' => $category->id])}}'">
                            {{__('messages.common.view') . ' ' . count($category->category_questions) . ' ' . __('messages.quizzes.questions')}}
                        </button>

                @endif

                <button type="button" class="btn btn-outline-info p-2 mb-2" onclick="optionBox.edit({{$category->id}})"> {{__('messages.common.edit')}} </button>
                <button type="button" class="btn btn-outline-danger p-2" onclick="optionBox.delete({{$category->id}})"> {{__('messages.common.delete')}} </button>
            </div>
        </div>
    </div>
</div>
