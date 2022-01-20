<table class="table table-responsive-sm table-striped table-bordered" id="gradesTbl">
    <thead>
        <tr>
            <th scope="col">{{ __('messages.common.name') }}</th>
            <th scope="col" class="d-none">{{ __('messages.common.email') }}</th>
            <th scope="col">{{ __('messages.quizzes.is_registered') }}</th>
            <th scope="col">{{ __('messages.quizzes.take_date') }}</th>
            <th scope="col">{{ __('messages.quizzes.take_number') }}</th>
            <th scope="col">{{ __('messages.common.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($quiz->quiz_candidate_grades as $candidate_grade)
            <tr>
                <td scope="col">
                    <a href="#" onclick="showUser({{$candidate_grade->user->id}})">
                        {{$candidate_grade->user->first_name . ' ' . $candidate_grade->user->last_name}}
                    </a>
                </td>
                <td scope="col" class="d-none"> {{$candidate_grade->user->email}} </td>
                <td scope="col"> <i class="fas fa-check-circle text-primary grade-fas"></i> </td>
                <td scope="col"> {{$candidate_grade->created_at}} </td>
                <td scope="col"> {{$candidate_grade->take_number + 1}} </td>
                <td scope="col">
                    <a href="#" title="show grades" onclick="showGrades({{$candidate_grade->quiz_id}}, {{$candidate_grade->user_id}}, {{$candidate_grade->take_number}})">
                        <i class="fas fa-info-circle text-info grade-fas"></i>
                    </a>
                    <a href="#" title="show question and answers" onclick="showdetailedGrades({{$candidate_grade->quiz_id}}, {{$candidate_grade->user_id}}, {{$candidate_grade->take_number}})">
                        <i class="fas fa-info-circle text-success grade-fas"></i>
                    </a>
                    <a href="#" title="Skills" onclick="showSkills({{$candidate_grade->quiz_id}}, {{$candidate_grade->user_id}}, {{$candidate_grade->take_number}})">
                        <i class="fas fa-clipboard-list text-danger grade-fas ml-3"></i>
                    </a>
                </td>
            </tr>
        @empty
         
        @endforelse

        @forelse ($quiz->quiz_guests_grades as $guest_grade)
            <tr>
                <td scope="col">
                    <a href="#" onclick="showUser({{$guest_grade->guest->id}}, 1)">
                        {{$guest_grade->guest->name}}
                    </a>
                </td>
                <td scope="col" class="d-none"> {{$guest_grade->guest->email}} </td>
                <td scope="col"> <i class="fas fa-times-circle text-danger grade-fas"></i> </td>
                <td scope="col"> {{$guest_grade->created_at}} </td>
                <td scope="col"> {{$guest_grade->take_number + 1}} </td>
                <td scope="col">
                    <a href="#" onclick="showGrades({{$guest_grade->quiz_id}}, {{$guest_grade->guest_id}}, {{$guest_grade->take_number}}, 1)">
                        <i class="fas fa-info-circle text-info grade-fas"></i>
                    </a>
                    <a href="#" onclick="showdetailedGrades({{$guest_grade->quiz_id}}, {{$guest_grade->guest_id}}, {{$guest_grade->take_number}}, 1)">
                        <i class="fas fa-info-circle text-success grade-fas"></i>
                    </a>
                    <a href="#" title="Skills" onclick="showSkills({{$guest_grade->quiz_id}}, {{$guest_grade->guest_id}}, {{$guest_grade->take_number}}, 1)">
                        <i class="fas fa-clipboard-list text-danger grade-fas ml-3"></i>
                    </a>
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>

<style>
    .dtrg-group {
        font-size: larger;
        color: #795548;
    }
    .grade-fas {
        font-size: larger !important;
    }
</style>