<table class="table table-bordered mt-2">
    <thead class="table-light">
        <tr>
            <th width="60%">Question</th>
            <th width="40%">Student Answer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
            @php
                $studentAnswer = null;

                // Check if this section/sub-section exists in $answers
                if(isset($answers[$sectionKey])){
                    // $answers[$sectionKey] is a collection of answer models
                    $ansModel = $answers[$sectionKey]->firstWhere('question_id', $question->id);

                    if($ansModel && $ansModel->answer_option){
                        $rawAnswer = $ansModel->answer_option;

                        // Map to answerOptions
                        if(isset($answerOptions[$question->id])){
                            foreach($answerOptions[$question->id] as $option){
                                if($option->option == $rawAnswer){
                                    $studentAnswer = $option->option_value; // show readable text
                                    break;
                                }
                            }

                            // If mapping fails, just show raw answer
                            if(!$studentAnswer){
                                $studentAnswer = strtoupper($rawAnswer);
                            }
                        } else {
                            // No mapping, just show raw
                            $studentAnswer = strtoupper($rawAnswer);
                        }
                    }
                }
            @endphp

            <tr>
                <td>{{ $question->question }}</td>
                <td>
                    
                    @if($studentAnswer)
                        <span class="badge bg-success">{{ $studentAnswer }}</span>
                    @else
                        <span class="badge bg-danger">Not Answered</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
